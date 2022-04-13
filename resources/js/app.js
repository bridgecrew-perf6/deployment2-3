/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'alpinejs';
require('./bootstrap');

window.Vue = require('vue').default;

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

require('./bootstrap');
require('alpinejs');
 
// TailwindCSS Dark Mode
 
// recupera el modo desde localStorage cuando la pagina carga la primera vez
if (localStorage.theme === 'radio' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: radio)').matches)) {
    document.querySelector('html').classList.add('radio')
} else if (localStorage.theme === 'dark') {
    document.querySelector('html').classList.add('radio')
}
 
// Evento click de los botones.
// Agreag la clase 'dark' al elemento html
// guarda o elimina el modo del localstorage 
document.querySelectorAll(".setMode").forEach(item => 
    item.addEventListener("click", () => {
        let htmlClasses = document.querySelector('html').classList;
        if(localStorage.theme == 'radio') {
            htmlClasses.remove('radio');
            localStorage.theme = ''
        } else {
            htmlClasses.add('radio');
            localStorage.theme = 'radio';
        }
    })
)
