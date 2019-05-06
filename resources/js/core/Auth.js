import axios from "axios";

class Auth {

    constructor() {
        this.token = window.localStorage.getItem('token');
        let userData = window.localStorage.getItem('user');
        this.user = userData ? JSON.parse(userData) : null;

        if (this.token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
        }
    }

    login(token, user, remember) {
        console.log(remember);
        window.localStorage.setItem('token', token);
        window.localStorage.setItem('user', JSON.stringify(user));
        window.localStorage.setItem('remember', remember);
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
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
        
        window.localStorage.removeItem('remember');
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('user');
    
        // Rediriger vers la homepage... Voir App.vue
    }
}

export default Auth;