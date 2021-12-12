/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Alpine from 'alpinejs';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

window.Alpine = Alpine;

Alpine.start();

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('index-component', require('./components/IndexComponent.vue').default);
Vue.component('search-result-component', require('./components/SearchResultComponent.vue').default);
Vue.component('search-card-component', require('./components/SearchCardComponent.vue').default);
Vue.component('show-movie-component', require('./components/ShowMovieComponent.vue').default);
Vue.component('my-index', require('./components/MyIndex.vue').default);
Vue.component('my-index-result', require('./components/MyIndexResult.vue').default);
Vue.component('popular', require('./components/Popular.vue').default);
Vue.component('recommend-component', require('./components/RecommendComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    router: new VueRouter(routes)

});
