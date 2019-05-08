import VueRouter from 'vue-router';
import Home from '../views/Home';
import About from '../views/About';
import Login from '../views/Login';
import Dashboard from '../views/Dashboard';
import Hello from '../views/Hello';
import UsersIndex from '../views/UsersIndex';
import UsersEdit from '../views/UsersEdit';
import RecettesIndex from '../views/RecettesIndex';
import RecettesEdit from '../views/RecettesEdit';
import NotFound from '../views/NotFound';

let routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: { middlewareAuth: true }
    },
    {
        path: '/hello',
        name: 'hello',
        component: Hello
    },
    {
        path: '/users',
        name: 'users.index',
        component: UsersIndex,
        meta: { middlewareAuth: true }
    },
    {
        path: '/users/:id/edit',
        name: 'users.edit',
        component: UsersEdit
    },
    {
        path: '/recettes',
        name: 'recettes.index',
        component: RecettesIndex,
    },
    {
        path: '/recettes/:id/edit',
        name: 'recettes.edit',
        component: RecettesEdit
    },
    {
        path: '/recettes/create',
        name: 'recettes.create',
        component: RecettesEdit
    },
    { path: '/404', name: '404', component: NotFound },
    { path: '*', redirect: '/404' },
];

const router = new VueRouter({
    routes
});

//redirect to login for all private pages
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuth)) {                
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next();
})

export default router;