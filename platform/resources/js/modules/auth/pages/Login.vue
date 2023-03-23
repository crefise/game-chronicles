<template>
    <div>
        <div>
            <div>
                Please type your email
                <input v-model="form.email">
            </div>
            <div>
                Please type your password
                <input v-model="form.password">
            </div>
            <button @click="registration">
                Login
            </button>
        </div>
        <div>
            <div>Server response</div>
            <div>{{ response }}</div>
        </div>
    </div>
</template>

<script>
import  axios from 'axios';
export default {
  name: 'Login',

  data () {
    return {
      response: null,
      form: {
        email: '',
        password: '',
      }
    }
  },

  methods: {
    registration () {
      console.log('login', this.form);
      axios.post('/api/login', this.form).then(({data}) => {
        console.log(data);
        this.response = data;
      });
    }
  }
}
</script>

<style scoped>

</style>
