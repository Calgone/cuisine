<template>
  <div class="container">
    <div class="content">
      <router-link
        class="button is-outlined is-link"
        :to="{ name: 'recettes.create' }"
      >Créer une recette</router-link>
    </div>
    <div class="content box">
      <div class="loading" v-if="loading">Loading...</div>

      <div v-if="error" class="error">
        <p>{{ error }}</p>
        <p>
          <button type="button" class="button is-warning" @click.prevent="fetchData">Try Again</button>
        </p>
      </div>

      <ul v-if="recettes">
        <li v-for="{ id, nom, description } in recettes" :key="id">
          <strong>Nom:</strong>
          {{ nom }},
          <strong>Description:</strong>
          {{ description }}
          <router-link :to="{ name: 'recette.view', params: { id } }">Voir</router-link>
          <router-link :to="{ name: 'recettes.edit', params: { id } }">Éditer</router-link>
        </li>
      </ul>
      <nav class="pagination" role="pagination" aria-label="pagination">
        <a class="pagination-previous" :disabled="! prevPage" @click.prevent="goToPrev">Previous</a>
        {{ paginationCount }}
        <a
          class="pagination-next"
          :disabled="! nextPage"
          @click.prevent="goToNext"
        >Next</a>
      </nav>
    </div>
  </div>
</template>
<script>

export default {
  data() {
    return {
      loading: false,
      recettes: null,
      meta: null,
      links: {
        first: null,
        last: null,
        next: null,
        prev: null
      },
      error: null
    };
  },
  computed: {
    nextPage() {
      if (!this.meta || this.meta.current_page === this.meta.last_page) {
        return;
      }

      return this.meta.current_page + 1;
    },
    prevPage() {
      if (!this.meta || this.meta.current_page === 1) {
        return;
      }

      return this.meta.current_page - 1;
    },
    paginationCount() {
      if (!this.meta) {
        return;
      }

      const { current_page, last_page } = this.meta;

      return `${current_page} of ${last_page}`;
    }
  },
  created() {
    

    this.fetchData(1);
  },
  methods: {
    goToNext() {
      this.fetchData(this.nextPage);
    },
    goToPrev() {
      this.fetchData(this.prevPage);
    },
    fetchData(page = 1) {
      this.error = this.users = null;
      this.loading = true;
      const params = { page };
      this.api.endpoints.recettes
        .getAll({ params })
        .then(response => {
          this.setData(null, response.data);
        })
        .catch(error => {
          this.setData(error, error.response.data);
        });
    },
    setData(err, { data: recettes, links, meta }) {
      if (err) {
        this.error = err.toString();
      } else {
        this.recettes = recettes;
        this.links = links;
        this.meta = meta;
      }
      this.loading = false;
    }
  }
};
</script>
