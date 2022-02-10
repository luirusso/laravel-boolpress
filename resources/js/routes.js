// DEPENDENCIES
import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS PER ROUTE
import Home from './pages/Home';
import About from './pages/About';
import Blog from './pages/Blog';
import PostDetail from './pages/PostDetail';
import NotFound from './pages/NotFound';


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
        {
            path: '/blog',
            name: 'blog',
            component: Blog,
        },
        {
            path: '/blog/:slug',
            name: 'post-detail',
            component: PostDetail,
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound,
        },
    ]
});

// NEEDED FOR ROUTER TO BE IMPORTED
export default router;