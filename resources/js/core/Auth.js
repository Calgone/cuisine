import axios from "axios";

class Auth {

    constructor() {
        this.token = null;
        this.user = null;
    }

    login(token, user) {
        console.log('auth.login()');
        window.localStorage.setItem('token', token);
        window.localStorage.setItem('user', JSON.stringify(user));
        console.log('auth.login() 2');
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        console.log('auth.login() 3');
        this.token = token;
        this.user = user;
        
        Event.$emit('userLoggedIn');
        
    }

    check() {
        return !!this.token;
    }

    logout() {
        this.token = null;
        this.user = null;
        // Rediriger vers la homepage... Voir App.vue
    }
}

export default new Auth();