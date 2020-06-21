<template>
  <header class="header">
    <router-link v-slot="{ href, isExactActive, navigate }" to="/">
      <a
        :href="href"
        :aria-current="isExactActive ? 'page' : false"
        class="logo"
        @click="navigate"
      >
        <h1>{{ $site.title }}</h1>
        <h6>Commoning <span class="red">live</span>:hood</h6>

      </a>
    </router-link>
    <audio ref="audioElm" controls preload="auto">
      <source src="http://streamer.nettitila.fi:8000/Station_of_commons" type="audio/mpeg">
    </audio>
    <div class="streaming">
      <h1 class="player" :style="{cursor: selectedCursor}" :class="{red: !toggle,playing: !toggle}" @click="(play) (toggle = !toggle)">{{ toggle ? 'PLAY' : 'LIVE' }}</h1>
    </div>
    <!--          <h4>{{ peers.children[0].title }}</h4>-->
  </header>
</template>

<script>
import page from '@/mixins/page'
export default {
  name: 'Header',
  mixins: [page],
  data () {
    return {
      toggle: true,
      peers: [],
      selectedCursor: 'url("data:image/svg+xml,%3Csvg version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\' width=\'32px\' height=\'32px\' viewBox=\'0 0 512 512\' style=\'enable-background:new 0 0 512 512;\' xml:space=\'preserve\'%3E %3Cpath d=\'M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4 L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1 c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1 c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z\'/%3E %3C/svg%3E"), pointer'
    }
  },
  async created () {
    this.peers = await this.$api.getPage('peers')
  },
  methods: {
    play: function (event) {
      const a = this.$refs.audioElm
      if (a.paused) {
        a.play()
      } else {
        a.pause()
      }
    }
  }
}

</script>

<style lang="scss" scoped>

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }

.player{
  font-family: Public Sans, sans-serif;
  font-weight: 100;
  font-variation-settings: 'wght' 100;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition: 3s all;
}
  audio {
    display: none;
  }

  h1 {
    -ms-overflow-style: none;
    -webkit-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    -moz-font-feature-settings: "kern=1", "liga=1", "calt=1"!important;
    -moz-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    font-variant-ligatures: discretionary-ligatures common-ligatures!important;
    -webkit-font-smoothing: antialiased !important;
    -moz-osx-font-smoothing: grayscale!important;
    font-size: 8rem;
    margin: 0.67em 0;
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 4rem;
      margin: 0.67em 0;
      -ms-overflow-style: none;
      -webkit-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
      -moz-font-feature-settings: "kern=1", "liga=1", "calt=1"!important;
      -moz-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
      font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
      font-variant-ligatures: discretionary-ligatures common-ligatures!important;
      -webkit-font-smoothing: antialiased !important;
      -moz-osx-font-smoothing: grayscale!important;
    }
  }

  .streaming{
    margin-top: 60px;
    margin-bottom: 60px;
  li {
    cursor: pointer;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-top: 5px;
    display: inline;
  }
  }
  .logo {
    h1{
      -ms-overflow-style: none;
      -webkit-font-feature-settings: "kern" 1, "liga" 0, "calt" 1!important;
      -moz-font-feature-settings: "kern=1", "liga=0", "calt=1"!important;
      -moz-font-feature-settings: "kern" 1, "liga" 0, "calt" 1!important;
      font-feature-settings: "kern" 1, "liga" 0, "calt" 1!important;
      font-variant-ligatures: no-common-ligatures!important;
      -webkit-font-smoothing: antialiased !important;
      -moz-osx-font-smoothing: grayscale!important;

    }

    padding: 0.5rem 0;

  }

  .header {
    margin-bottom: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;

    a {
      position: relative;
      font-size: 2.875rem;
      letter-spacing: 0.05em;
      padding: 0.5rem 0;
      font-family: Till;
    }

    .red {
      color: red;
    }
  }

  h1 {
    margin-top: 0;
    margin-bottom: 0;
    text-transform: uppercase;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
    font-weight: initial;
    line-height: 0.9;
  }

  h6 {
    font-family: Public Sans, sans-serif;
    font-weight: 100;
    font-variation-settings: 'wght' 100;
    animation: live 10000ms infinite forwards;
    letter-spacing: 0.5px;
  }
  .playing{
    animation: live 5000ms infinite forwards;
transition: all;
  }

  @keyframes live {

    100% {
      font-variation-settings: 'wght' 100;
    }
    40% {
      font-variation-settings: 'wght' 500;
    }

  }

  @keyframes alive {

    100% {
      font-variation-settings: 'wght' 100;
    }
    40% {
      font-variation-settings: 'wght' 500;
    }

  }

</style>
