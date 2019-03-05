import './bootstrap';

import ExampleComponent from './components/ExampleComponent.vue';

Vue.component('example-component', ExampleComponent);

const app = new Vue({
    el: '#app',

    data: {
        displayNavigation: false
    },

    methods: {
        post(url) {
            axios.post(url)
                .then(({ data }) => {
                    window.location.replace(data.redirect ? data.redirect : '/');
                })
        }
    }
});
