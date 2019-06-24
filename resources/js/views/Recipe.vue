<template>
  <div>
    <h1 class="title">{{ recipe.nom }}</h1>
    <nav class="level">
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Nombre de personnes</p>
          <p class="title">{{ recipe.nb_people }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Temps de préparation</p>
          <p class="title">{{ recipe.prep_minutes }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Temps de cuisson</p>
          <p class="title">{{ recipe.cook_minutes }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Difficulté</p>
          <p class="title">{{ recipe.difficulty }}</p>
        </div>
      </div>
    </nav>
    <div>
        {{ recipe.description }}
    </div>
    <div class="content">
        <ol type="1">
            <li v-for="step in recipe.steps" v-bind:key="step.id">
                {{ step.description }}
            </li>
        </ol>
    </div>
    <router-link v-if="recipe.id && authenticated" :to="{ name: 'recipes.edit', params: { id: recipe.id } }">Éditer la recipe</router-link>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      authenticated: auth.check(),
      recipe: {}
    };
  },
  created() {
    // console.log("created");
    // axios.get("/api/recipes/" + this.$route.params.id).then(response => {
    //   this.recipe = response.data.data;
    //   console.log(this.recipe);
    // });
    const id = this.$route.params.id;
    // console.log(id);
    this.api.endpoints.recipes
        .getOne({ id })
        .then(response => {
          this.recipe = response.data.data;
          // console.log(this.recipe);
        })
        .catch(error => {
          console.log(error, error.response.data);
        });
  }
};
</script>
