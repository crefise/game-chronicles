import Vue from 'vue';
import Login from './pages/Login';
import Registration from './pages/Registration';

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
    Login,
    Registration
  }
}));
