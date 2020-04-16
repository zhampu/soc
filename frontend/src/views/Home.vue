<template>
  <main id="main">
    <div v-for="event in events.children" :key="event.id" class="module">
      <router-link :to="`/${event.id}`">
        <span>
          <time class="date">{{ event.date }}</time>
          <h2 class="title">{{ event.title }}</h2>
          <hr>
          <h4 class="headline">{{ event.headline }}</h4>

        </span>
      </router-link>
    </div>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'Home',

  components: {

  },

  mixins: [page],

  data () {
    return {
      events: []
    }
  },

  async created () {
    this.events = await this.$api.getPage('events')
  }
}
</script>

<style lang="scss" scoped>

  audio{
    width: 100%;

    border: #2d2e36;
  }
  .main{

    display: flex;
    flex-direction: column-reverse;
  }
  .module {
    margin-left: auto;
    margin-right: auto;
    z-index: 1000;
    margin-top: 1rem;
    margin-bottom: 1rem;
    -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, .25);
    box-shadow: 0 0 15px rgba(0, 0, 0, .25);
    background: #fff;
    border: 1px solid #000;
    -webkit-border-radius: .8vh;
    border-radius: .8vh;
    padding: 3vh;
    text-align: center;
    max-width: 90vw;
  }
    h2{

      font-family: Till;
      font-weight: normal;
      /*transform: skew(5deg);*/

    }
  .date{
    color: #ff0000;
    display: block;
    margin-bottom: 12px;
  }
    .title{
      display: block;
      font-size: 3rem;
      text-transform: uppercase;
      margin-bottom: 12px;
    }
  .headline{
    margin-top: 12px;
    display: block;
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    font-weight: 400;

  }

  hr {
    box-shadow: 0 0 5px rgba(0, 0, 0, .10);
    box-sizing: content-box;
    overflow: visible;
    height: 11.5px;
    background-color: #f1f1f1;
    border: none;
    border-radius: 7px 7px 7px 7px;
  }

</style>
