<template>
  <div id="app">
    <router-link
      ref="skiplink"
      to="#main"
      class="skip-to-content-link"
      @click.native="scrollFix('#main')"
    />
    <div class="page">
      <nav class="menu">
        <router-link
          v-for="page in $site.children.filter(page => page.isListed)"
          v-slot="{ href, isExactActive, navigate }"
          :key="page.id"
          :to="`/${page.id}`"
          @click.native="$root.scrollTop"
        >
          <a
            :href="href"
            :aria-current="isExactActive ? 'page' : false"
            @click="navigate"
          >
            {{ page.title }}
          </a>
        </router-link>
      </nav>
      <Header />
      <keep-alive>
        <transition
          name="fade"
          mode="out-in"
        >
          <router-view :key="$route.path.substr(1) || 'home'" @update-title="updateTitle" />
        </transition>
      </keep-alive>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'

export default {
  name: 'App',

  components: {
    Header,
    Footer
  },

  data () {
    return {
      isRefreshing: false

    }
  },

  mounted () {
    // Handle anchors, see https://stackoverflow.com/a/45206192
    setTimeout(() => this.scrollFix(this.$route.hash), 2)
  },

  methods: {
    updateTitle (title) {
      const pageTitle = !this.isHomePage ? `${title} – ${this.$site.title}` : this.$site.title
      document.title = pageTitle

      // Set route announcement
      this.$announcer.set(`Current page: ${title}`)
      // Set route focus
      this.$refs.skiplink.$el.focus()
    },

    scrollFix (hashbang) {
      if (hashbang) window.location.hash = hashbang
    }
  }
}
</script>

<style lang="scss">
  @font-face {
    font-family: Till;
    src: url('./fonts/Till-Normal.eot');
    src: url('./fonts/Till-Normal.eot?#iefix') format('embedded-opentype'),
    url('./fonts/Till-Normal.svg#Till-Normal') format('svg'),
    url('./fonts/Till-Normal.ttf') format('truetype'),
    url('./fonts/Till-Normal.woff') format('woff'),
    url('./fonts/Till-Normal.woff2') format('woff2');
    font-weight: normal;
  }

  @font-face {
    font-family: Public Sans;
    src: url('./fonts/publicsans-variablefont_wght.ttf') format('truetype');
  }

  strong{
    letter-spacing: 0.04em;
  }
  :root {
    --content-width: 65rem;
  }

  .layout{
    h2 {
      font-weight: 500;
    }
  }

  .fade-enter-active,
  .fade-leave-active {
    transition-duration: 0.3s;
    transition-property: opacity;
    transition-timing-function: ease;
  }

  .fade-enter,
  .fade-leave-active {
    opacity: 0
  }

  *,
  *:after,
  *:before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

  }

  html {
    font-family: Public Sans, sans-serif;

  }

  body {
    font-kerning: auto;
    width: 100vw;
    height: 100vh;
    overflow-x: hidden;
    -ms-overflow-style: none;
    -webkit-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    -moz-font-feature-settings: "kern=1", "liga=1", "calt=1"!important;
    -moz-font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    font-feature-settings: "kern" 1, "liga" 1, "calt" 1!important;
    font-variant-ligatures: discretionary-ligatures common-ligatures!important;
    -webkit-font-smoothing: antialiased !important;
    -moz-osx-font-smoothing: grayscale!important;
  }

  p {
    margin-bottom: 20px;
    margin-top: 20px;
    line-height: 1.5;
  }

  .skip-to-content-link {
    position: absolute;
    left: 50%;
    height: 2rem;
    padding: 0.5rem;
    transform: translate(-50%, -100%);
    transition: transform 0.3s;
  }

  .skip-to-content-link:focus {
    transform: translate(-50%, 0%);
    outline: none;
  }

  *:focus {
    outline: none;
  }

  li {
    list-style: none;
  }

  a {
    color: currentColor;
    text-decoration: none;
  }

  .page {
    padding: 5vh 5vw 10vh;
  }

  .page > * {
    max-width: var(--content-width);
    margin: 0 auto;
  }

  main {
    min-height: calc(100vh - 10rem);
  }
  .menu {
    z-index: 10;
    position: fixed;
    top: 10px;
    left: 10px;
    a {
      font-size: 1rem;
    }
    a:nth-child(2) {
      position: fixed;
      right: 10px;
      top:10px;
    }

  }

  .menu a[aria-current],
  .menu a.router-link-active {
    border-bottom: 2px solid #000;
  }
  @media (max-width: 768px) {
    .menu{
      left:4.7vw;
    }
  }
</style>
