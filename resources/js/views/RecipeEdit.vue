<template>
  <div>
    <div v-if="message" class="alert">{{ message }}</div>
    <div v-if="! loaded">Loading...</div>
    <form @submit.prevent="onSubmit($event)" v-else>
      <div class="field">
        <label class="label" for="nom">Nom</label>
        <div class="control">
          <input
            type="text"
            class="input"
            name="nom"
            placeholder="nom"
            v-model="recipe.nom"
            required
          >
        </div>
      </div>

      <div class="field">
        <label class="label" for="description">Description</label>
        <div class="control">
          <textarea
            name="description"
            class="textarea"
            id="description"
            v-model="recipe.description"
            cols="30"
            rows="10"
            required
          ></textarea>
        </div>
      </div>
      <div class="field is-grouped">
        <p class="control">
          <button class="button is-link" type="submit" :disabled="saving">
            <span class="icon is-small">
              <i class="fas fa-check"></i>
            </span>
            <span>Valider</span>
          </button>
        </p>
        <p class="control">
          <button
            class="button is-danger"
            type="button"
            :disabled="saving"
            @click.prevent="onDelete($event)"
          >Supprimer</button>
        </p>
        <p class="control">
          <button class="button is-text" type="button" @click="retour">Retour</button>
        </p>
      </div>
    </form>
  </div>
</template>
<script>
// import api from "../api/users";

export default {
  data() {
    return {
      message: null,
      loaded: false,
      saving: false,
      recipe: {
        id: null,
        nom: "",
        description: "",
        created_at: "",
        updated_at: ""
      }
    };
  },
  methods: {
    onSubmit(event) {
      // Form submit event
      this.saving = true;

      this.api.endpoints.recipes
        .update(this.recipe)
        .then(response => {
          this.message = "Recipe updated";
          setTimeout(() => (this.message = null), 2000);
          this.recipe = response.data.data;
        })
        .catch(error => {
          console.log(error);
        })
        .then(_ => {
          this.saving = false;
          this.$router.go(-1);
        });
    },
    onDelete() {
      this.saving = true;
      console.log(this.recipe.id);
      this.api.endpoints.recipes.delete(this.recipe).then(response => {
        // console.log(response);
        this.message = "Recipe deleted.";
        setTimeout(() => this.$router.push({ name: "recipes.index" }), 2000);
      });
    },
    retour() {
      this.$router.go(-1);
    }
  },
  created() {
    // Load recipe details
    console.log(this.$route.params.id);
    const id = this.$route.params.id;
    this.api.endpoints.recipes
      .getOne({ id })
      .then(response => {
        this.loaded = true;
        this.recipe = response.data.data;
        console.log(response.data.data);
      })
      .catch(err => {
        this.$router.push({ name: "404" });
      });
  }
};
</script>
<style lang="scss" scoped>
$red: lighten(red, 30%);
$darkRed: darken($red, 50%);
.form-group label {
  display: block;
}
.alert {
  background: $red;
  color: $darkRed;
  padding: 1rem;
  margin-bottom: 1rem;
  width: 50%;
  border: 1px solid $darkRed;
  border-radius: 5px;
}
</style>