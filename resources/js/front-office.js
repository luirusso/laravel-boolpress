// IMPORT DEPENDENCIES
import Vue from 'vue';
import App from './views/App';

// VUEROUTER 
import router from './routes';

// VUE INSTANCE
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
});