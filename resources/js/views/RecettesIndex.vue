<template>
  <div class="users">
    <div class="loading" v-if="loading">Loading...</div>

    <div v-if="error" class="error">
      <p>{{ error }}</p>

      <p>
        <button @click.prevent="fetchData">Try Again</button>
      </p>
    </div>

    <ul v-if="users">
      <li v-for="{ id, nom, description } in recettes" :key="id">
        <strong>Nom:</strong>
        {{ nom }},
        <strong>Description:</strong>
        {{ description }}
        <router-link :to="{ name: 'recettes.edit', params: { id } }">Edit</router-link>
      </li>
    </ul>
    <div class="pagination">
      <button class="button is-rounded" :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
      {{ paginationCount }}
      <button
        class="button is-rounded"
        :disabled="! nextPage"
        @click.prevent="goToNext"
      >Next</button>
    </div>
  </div>
</template>
<script>
// import axios from "axios";
import API from "../api/api";

const myApi = new API({ url:'127.0.0.1:8080/api' });


const getUsers = (page, callback) => {
  const params = { page };
  myApi.createEntity({ name: 'recettes' });

  myApi.endpoints.recettes
    .getAll({ params })
    .then(response => {
      callback(null, response.data);
    })
    .catch(error => {
      callback(error, error.response.data);
    });
};

export default {
  data() {
    return {
      loading: false,
      users: null,
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
  beforeRouteEnter(to, from, next) {
    getUsers(to.query.page, (err, data) => {
      // on a pas accès à this car le composant n'est pas rendu
      // donc on envoie un callback à next pour lancer setData après affichage
      next(vm => vm.setData(err, data));
    });
  },
  // when route changes and this component is already rendered,
  // the logic will be slightly different.
  // Ici on a accès à "this" sur le composant car il est affiché
  beforeRouteUpdate(to, from, next) {
    this.loading = true;
    this.users = this.links = this.meta = null;
    // console.log(to, from, next);
    getUsers(to.query.page, (err, data) => {
      this.setData(err, data);
      this.loading = false;
      next(); // pas besoin du callback cette fois, on a utilisé this.setData() juste au dessus
    });
  },
  //   created() {
  //     this.fetchData();
  //   },
  methods: {
    goToNext() {
      this.$router.push({
        query: {
          page: this.nextPage
        }
      });
    },
    goToPrev() {
      this.$router.push({
        name: "users.index",
        query: {
          page: this.prevPage
        }
      });
    },
    setData(err, { data: users, links, meta }) {
      if (err) {
        this.error = err.toString();
      } else {
        this.users = users;
        this.links = links;
        this.meta = meta;
      }
    }
  }
};
</script>
