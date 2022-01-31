// IMPORT DEPENDENCIES
import Vue from 'vue';
import App from './views/App';

// VUE INSTANCE
const root = new Vue({
    el: '#root',
    render: h => h(App),
});