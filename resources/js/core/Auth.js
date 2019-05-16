import axios from "axios";

class Auth {

    constructor() {
        this.token = window.localStorage.getItem('token');
        let userData = window.localStorage.getItem('user');
        this.user = userData ? JSON.parse(userData) : null;

        if (this.token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;

            this.getUser();
        }
    }

    login(token, user, remember) {
        // console.log(remember);
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
        Event.$emit('userLoggedOut');
        // Rediriger vers la homepage... Voir App.vue
    }

    /**
     * make an AJAX call and update the user property 
     * after a successful request or log the user out 
     * if the response code was 401 "Unauthorized"
     */
    getUser() {
        api.call('get', '/api/get-user')
            .then(({data}) => {
                this.user = data;
            });
    }
}

export default Auth;