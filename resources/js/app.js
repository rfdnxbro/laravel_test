/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
  data: {
    posts: [],
    title: '',
    content: '',
    errors: {},
    api_token: document.getElementsByName('api_token')[0].content,
  },
  methods: {
    fetchPosts: function(){
      axios.get('/api/posts?api_token=' + this.api_token).then((res)=>{
        this.posts = res.data
      })
    },
    onSubmit: function(){
      const params = {
        title: this.title,
        content: this.content,
        api_token: this.api_token,
      };
      this.errors = {};
      axios.post('/api/posts', params).then(res =>{
        this.title = '';
        this.content = '';
        this.fetchPosts();
      }).catch(err =>{
        for(var key in err.response.data.errors) {
            this.$set(this.errors, key, err.response.data.errors[key].join('<br>'));
        }
      });
    }
  },
  created() {
    this.fetchPosts()
  },
});
