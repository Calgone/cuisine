<template>
  <div>
    <h1 class="title">{{ recette.nom }}</h1>
    <nav class="level">
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Nombre de personnes</p>
          <p class="title">{{ recette.nb_personnes }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Temps de préparation</p>
          <p class="title">{{ recette.prepa_minutes }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Temps de cuisson</p>
          <p class="title">{{ recette.cuisson_minutes }}</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <p class="heading">Difficulté</p>
          <p class="title">{{ recette.difficulte }}</p>
        </div>
      </div>
    </nav>
    <div>
        {{ recette.description }}
    </div>
    <div class="content">
        <ol type="1">
            <li v-for="etape in recette.etapes" v-bind:key="etape.id">
                {{ etape.description }}
            </li>
        </ol>
    </div>
    <router-link v-if="recette.id && authenticated" :to="{ name: 'recettes.edit', params: { id: recette.id } }">Éditer la recette</router-link>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      authenticated: auth.check(),
      recette: {}
    };
  },
  created() {
    // console.log("created");
    // axios.get("/api/recettes/" + this.$route.params.id).then(response => {
    //   this.recette = response.data.data;
    //   console.log(this.recette);
    // });
    const id = this.$route.params.id;
    // console.log(id);
    this.api.endpoints.recettes
        .getOne({ id })
        .then(response => {
          this.recette = response.data.data;
          // console.log(this.recette);
        })
        .catch(error => {
          console.log(error, error.response.data);
        });
  }
};
</script>
