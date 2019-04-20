import './bootstrap'

import Slide from 'vue-slide-up-down'

Vue.component('slide', Slide)

Vue.component('example-component', require('./components/ExampleComponent.vue'))

Vue.component('passport-secret', require('./components/passport/Secret.vue'))
Vue.component('passport-clients', require('./components/passport/Clients.vue'))
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'))
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'))

const app = new Vue({
    el: '#app',

    data: {
        displayNavigation: false
    },

    methods: {
        logout() {
            this.$refs.logoutForm.submit()
        }
    }
})
