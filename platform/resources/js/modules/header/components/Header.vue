<template>
 <div class="unique-class-header">
     <div>
         User is
         <strong :class="authorized ? 'unique-authorized' : 'unique-unauthorized'">
            {{ authorized ? 'authorized' : 'do not authorized'}}
         </strong>
     </div>
     <template v-if="!authorized">
         <div>
             <a href="/login">Login</a>
         </div>
         <div>
             <a href="/registration">Registration</a>
         </div>
     </template>

     <template v-if="authorized">
         <div>
             <a href="/dashboard">Dashboard</a>
         </div>
         <div>
             <a @click="logout">Logout</a>
         </div>
     </template>

 </div>
</template>

<script>
import axios from "axios";

export default {
  /**
   * Component name
   */
  name: 'Header',

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

<style scoped>
    .unique-class-header {
        display: flex;
        justify-content: space-around;
        border: 1px black solid;
    }

    .unique-unauthorized {
        font-weight: bold;
        color: red;
    }

    .unique-authorized {
        font-weight: bold;
        color: green;
    }
</style>
