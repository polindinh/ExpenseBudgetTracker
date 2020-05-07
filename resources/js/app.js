require('./bootstrap');
window.Jquery = require('jquery');
import Vue from 'vue';

import App from "./components/app";
import router from "./router";
import store from "./store"

import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

const app = new Vue({
    el: '#app',
    components:{App},
    router,
    store
});
