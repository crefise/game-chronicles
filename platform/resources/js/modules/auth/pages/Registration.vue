<template>
    <div>
        <div>
            <div>
                Please type your nickname
                <input v-model="form.nickname">
            </div>
            <div>
                Please type your email
                <input v-model="form.email">
            </div>
            <div>
                Please type your password
                <input v-model="form.password">
            </div>
            <button @click="registration">
                Registration
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
  name: 'Registration',

  data () {
    return {
      response: null,
      form: {
        email: '',
        password: '',
        nickname: '',
      }
    }
  },

  methods: {
    registration () {
      console.log('registration', this.form);
      axios.post('/api/registration', this.form).then(({data}) => {
        console.log(data);
        this.response = data;
      });
    }
  }
}
</script>

<style scoped>

</style>
