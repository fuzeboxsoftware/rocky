
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


Vue.component(
    'passport-clients',
    require('../assets/js/components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('../assets/js/components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('../assets/js/components/passport/PersonalAccessTokens.vue')
);

Vue.component(
	'teams',
	require('../assets/js/components/Teams.vue')
);

Vue.component(
	'update-player',
	require('../assets/js/components/UpdatePlayer.vue')
);

Vue.component(
	'update-team',
	require('../assets/js/components/UpdateTeam.vue')
);

const app = new Vue({
    el: '#app'
});
