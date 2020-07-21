require('./bootstrap');

import App from './App.vue';
import Vue from 'vue';
import store from './store';

import { library } from '@fortawesome/fontawesome-svg-core';
import { faTrash, faPlus, faCheck } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add( faTrash, faPlus, faCheck );

Vue.component('f-a-i', FontAwesomeIcon);

Vue.config.productionTip = false;

new Vue({
    store,
    render: h => h(App)
}).$mount('#app');