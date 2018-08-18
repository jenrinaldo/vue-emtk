import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import Routes from './routes'
import imagesLoaded from 'vue-images-loaded';
import Isotope from 'vueisotope';
import VueDragscroll from 'vue-dragscroll'
import VueHead from 'vue-head'

Vue.use(VueResource);
Vue.use(VueHead, {
	separator: '|',
	complement : 'HIMATEKKOM UB'
});
Vue.use(VueRouter);
Vue.use(VueDragscroll);

Vue.directive('images-loaded' ,imagesLoaded);
Vue.component('Isotope', Isotope)

const router = new VueRouter({
	routes : Routes,
	mode : 'history'
})

new Vue({
  el: '#app',
  render: h => h(App),
  router: router
})
