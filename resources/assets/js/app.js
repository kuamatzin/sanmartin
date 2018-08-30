
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('compra-menor', require('./components/CompraMenor.vue'));
Vue.component('crear-compra-menor', require('./components/CrearCompraMenor.vue'));
Vue.component('cotizar-compra-menor', require('./components/CotizarCompraMenor.vue'));
Vue.component('eliminar-compra', require('./components/EliminarCompra.vue'));

const app = new Vue({
    el: '#app'
});
