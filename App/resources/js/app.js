
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Button.js
require('./buttons');

// Charts js
require('./Chart.min');

// Shards js
require('./shards.min');

// Sharrre js
require('./jquery.sharrre.min');

// Extras
require('./extras.1.1.0.min');

// Shards Dashboard js
require('./shards-dashboards.1.1.0.min');

// App blog
require('./app-blog-overview.1.1.0');

// //calendar
// require('./packages/core/main');
// require('./packages/interaction/main');
// require('./packages/daygrid/main');
// require('./packages/timegrid/main');
// require('./packages/list/main');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
