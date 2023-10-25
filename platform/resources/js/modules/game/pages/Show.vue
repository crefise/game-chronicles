<template>
  <div>
    <div>
      <h1>Show game page</h1>
      <div class="box">
        <div>
          <div v-html="game.id"></div>
          <div v-html="game.name"></div>
          <div v-html="game.key"></div>
        </div>
        <div>
          <button>Attach</button>
          <button>Detach</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Game',
  data () {
    return {
      game: {}
    }
  },
  created () {
    console.log('Index was created. Loading games');
    this.loadGame();
  },
  methods: {
    /**
     * TODO: Should be moved to api.js and store
     */
    loadGame () {
      const url = window.location.href;
      const id = url.substring(url.lastIndexOf('/') + 1);;
      axios.get(`/api/games/${id}`).then(({ data }) => {
        console.log('response from server:', data);
        this.game = data
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
