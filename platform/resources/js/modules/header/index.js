import Vue from 'vue';
import Header from './components/Header';

(new Vue({
  /**
   * Name.
   */
  name: 'Header',

  /**
   * Mount point.
   */
  el: '.header',

  /**
   * Components.
   */
  components: {
    HeaderComponent: Header,
  }
}));
