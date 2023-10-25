<template>
  <div class="custom-header">
    <div class="absolute-cross-lines">
      <div class="absolute-cross-lines-line"></div>
      <div class="absolute-cross-lines-line"></div>
    </div>
    <div class="custom-header-box">
      <div class="custom-header-logo">
        <img src="/images/icons/logo.png">
      </div>
      <div>
        <custom-input />
      </div>
    </div>
    <div class="custom-header-box">
      <custom-button>Login</custom-button>
      <custom-button>Register</custom-button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CustomButton from "Modules/fundamentals/inputs/CustomButton.vue";
import CustomInput from "Modules/fundamentals/inputs/CustomInput.vue";

export default {
  /**
   * Component name
   */
  name: 'Header',

  components: {
    CustomInput,
    CustomButton
  },

  /**
   * Props
   */
  props: {
    /**
     * Define if user is authorized
     */
    authorized: {
      required: true
    }
  },

  methods: {
    logout () {
      console.log('Logout action');
      axios.get('/api/logout').then((response) => {
        console.log(response);
      });
    }
  }
}
</script>
