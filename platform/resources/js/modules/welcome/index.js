import Vue from 'vue';
import Index from './pages/Index';

(new Vue({
  /**
   * Name.
   */
  name: 'Welcome',

  /**
   * Mount point.
   */
  el: '#app',

  /**
   * Components.
   */
  components: {
    Index
  }
}));
