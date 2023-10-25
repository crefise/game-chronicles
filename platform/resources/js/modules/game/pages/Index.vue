<template>
  <div>
    <div>
      <h1>All games</h1>
      <div v-for="game in games">
        <div class="box">
          <div v-html="game.id"></div>
          <div v-html="game.name"></div>
          <div v-html="game.key"></div>
        </div>
      </div>
      <h1>My games</h1>
      <div v-for="game in myGames">
        <div class="box">
          <div v-html="game.id"></div>
          <div v-html="game.name"></div>
          <div v-html="game.key"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Index',
  data () {
    return {
      games: [],
      myGames: [],
    }
  },
  created () {
    console.log('Index was created. Loading games');
    this.loadGames();
  },
  methods: {
    /**
     * TODO: Should be moved to api.js and store
     */
    loadGames () {
      axios.get('/api/games/').then(({ data }) => {
        console.log('response from server:', data);
        this.games = data
      })

      axios.get('/api/users/1/games').then(({ data }) => {
        console.log('response from server:', data);
        this.myGames = data
      })
    }
  }
}
</script>

<style scoped>
  .box {
      margin: 15px;
      padding: 4px;
      border: 1px black solid;
  }
</style>
