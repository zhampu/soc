<template>
  <main id="main">
    <!--    <Intro :page-title="page.title" />-->

    <div v-for="event in events.children" :key="event.id" class="module">
      <router-link :to="`/${event.id}`">
        <span>

          <h2 class="example-name">{{ event.title }}</h2>
          <h3 class="example-name">{{ event.headline }}</h3>
          <time class="example-name">{{ event.date }}</time>
        </span>

        <!--        <figure v-if="album.cover" class="album-cover">-->
        <!--          <img :src="album.cover.url" :alt="page.cover.alt">-->

        <!--          <figcaption>-->
        <!--            <h1>{{ page.headline }}</h1>-->
        <!--          </figcaption>-->
        <!--        </figure>-->
      </router-link>
    </div>
  </main>
</template>

<script>
import page from '@/mixins/page'
// import Intro from '@/components/Intro.vue'

export default {
  name: 'Home',

  components: {

    // Intro
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
    padding: 10px;
    border-radius: .5rem;
    border: 1px solid black;
    /*<!--transform: skew(-5deg);-->*/

    h2{

      font-family: Till;
      font-weight: normal;
      /*transform: skew(5deg);*/

    }

    .example-name{
      margin-top: 10px;
      margin-bottom: 10px;
      display: block

    }
  }

</style>
