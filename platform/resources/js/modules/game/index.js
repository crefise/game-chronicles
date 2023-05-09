import Vue from 'vue';
import Index from './pages/Index';
import Show from './pages/Show';

(new Vue({
  /**
   * Name.
   */
  name: 'Game',

  /**
   * Mount point.
   */
  el: '#app',

  /**
   * Components.
   */
  components: {
    Index,
    Show,
  }
}));
