<template>
  <div>
    <nav class="navbar is-fixed-top is-light" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <router-link class="navbar-item" :to="{ name: 'home' }">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </router-link>

        <a
          role="button"
          class="navbar-burger burger"
          aria-label="menu"
          aria-expanded="false"
          data-target="navbarBasicExample"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <router-link class="navbar-item" :to="{ name: 'home' }">Accueil</router-link>
          <!-- <a class="navbar-item">Accueil</a> -->
          <router-link class="navbar-item" :to="{ name: 'recettes.index' }">Recettes</router-link>

          <router-link class="navbar-item" :to="{ name: 'hello' }">Hello World</router-link>

          <router-link class="navbar-item" :to="{ name: 'users.index' }">Users</router-link>

          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">More</a>

            <div class="navbar-dropdown">
              <router-link class="navbar-item" :to="{ name: 'about' }">About</router-link>
              <a class="navbar-item">Jobs</a>
              <a class="navbar-item">Contact</a>
              <hr class="navbar-divider">
              <a class="navbar-item">Report an issue</a>
            </div>
          </div>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div v-if="authenticated && user">
              <p>Bienvenue {{ user.prenom }}</p>

              <button @click="logout" class="button is-danger is-inverted">déconnexion</button>
            </div>
            <div class="buttons" v-else>
              <a class="button is-primary">
                <strong>Inscription</strong>
              </a>
              <router-link :to="{ name: 'login' }" class="button is-light">Connexion</router-link>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <h1>La cuisine de Grégory</h1>
    <div class="section">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      authenticated: auth.check(),
      user: auth.user
    };
  },

  mounted() {
    Event.$on("userLoggedIn", () => {
      this.authenticated = true;
      this.user = auth.user;
    });
    Event.$on("userLoggedOut", () => {
      this.authenticated = false;
      this.user = null;
      this.$router.push("/login");
    });
  },
  methods: {
    logout() {
      auth.logout();
    }
  }
};
</script>
<style>
</style>
