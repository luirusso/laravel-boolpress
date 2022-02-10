// DEPENDENCIES
import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS PER ROUTE
import Home from './pages/Home';

// ACTIVATION
Vue.use(VueRouter);

// ROUTES
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        }
    ]
});

// NEEDED FOR ROUTER TO BE IMPORTED
export default router;