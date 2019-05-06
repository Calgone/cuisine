<template>
  <section class="hero is-light is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Bienvenue</h3>
          <p class="subtitle has-text-grey">Connectez-vous pour continuer.</p>
          <div class="box">
            <form>
              <div class="field">
                <div class="control">
                  <input
                    class="input"
                    type="text"
                    name="email"
                    v-model="email"
                    required
                    placeholder="Identifiant"
                  >
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <input
                    class="input"
                    type="password"
                    name="password"
                    v-model="password"
                    required
                    placeholder="Votre mot de passe"
                  >
                </div>
              </div>
              <div class="field">
                <label class="checkbox">
                  <input
                    type="checkbox"
                    name="remember"
                    v-model="remember"
                    @click="toggleRemember"
                  >
                  Rester connecté
                </label>
              </div>
              <div class="field">
                <button
                  type="button"
                  class="button is-block is-info is-fullwidth"
                  @click="login"
                >Connexion</button>
              </div>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="../">Inscription</a> &nbsp;·&nbsp;
            <a href="../">Mot de passe oublié</a> &nbsp;·&nbsp;
            <a href="../">Aide</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      email: "",
      password: "",
      remember: false,
    };
  },

  methods: {
    toggleRemember() {
      this.remember = !this.remember;
    },
    login() {
      let data = {
        email: this.email,
        password: this.password,
      };

      axios
        .post("/api/login", data)
        .then(({ data }) => {
          // Store data
          //   console.log(auth);
          auth.login(data.token, data.user, this.remember);
          this.$router.push("/dashboard");
          console.log("push");
        })
        .catch(({ response }) => {
          console.log(response);
          alert(response.data.message);
        });
    }
  }
};
</script>