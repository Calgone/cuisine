<template>
  <div>
    <div v-if="message" class="alert">{{ message }}</div>
    <div v-if="! loaded">Loading...</div>
    <form @submit.prevent="onSubmit($event)" v-else>
      <div class="field">
        <label for="user_nom">Nom</label>
        <div class="control">
          <input class="input" id="user_nom" v-model="user.nom">
        </div>
      </div>
      <div class="field">
        <label for="user_prenom">Name</label>
        <div class="control">
          <input class="input" id="user_prenom" v-model="user.prenom">
        </div>
      </div>
      <div class="field">
        <label for="user_email">Email</label>
        <div class="control">
          <input class="input" id="user_email" type="email" v-model="user.email">
        </div>
      </div>
      <div class="field is-grouped">
        <button class="button is-link" type="submit" :disabled="saving">Valider</button>
        <button
          class="button is-danger" type="button"
          :disabled="saving"
          @click.prevent="onDelete($event)"
        >Supprimer</button>
        <button class="button is-text" type="button" @click="retour">Retour</button>
      </div>
    </form>
  </div>
</template>
<script>
import api from "../api/users";

export default {
  data() {
    return {
      message: null,
      loaded: false,
      saving: false,
      user: {
        id: null,
        nom: "",
        prenom: "",
        email: "",
      }
    };
  },
  methods: {
    onSubmit(event) {
      // Form submit event
      this.saving = true;

      this.api
        .update(this.user.id, {
          name: this.user.name,
          email: this.user.email
        })
        .then(response => {
          this.message = "User updated";
          setTimeout(() => (this.message = null), 2000);
          this.user = response.data.data;
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

      api.delete(this.user.id).then(response => {
        console.log(response);
        this.message = "Utilisateur supprimé.";
        setTimeout(() => this.$router.push({ name: "users.index" }), 2000);
      });
    },
    retour() {
      this.$router.go(-1);
    }
  },
  created() {
    // Load user details
    api
      .find(this.$route.params.id)
      .then(response => {
        this.loaded = true;
        this.user = response.data.data;
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