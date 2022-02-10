// DEPENDENCIES
import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS PER ROUTE
import Home from './pages/Home';
import About from './pages/About';


// ACTIVATION
Vue.use(VueRouter);

// ROUTES
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
    ]
});

// NEEDED FOR ROUTER TO BE IMPORTED
export default router;