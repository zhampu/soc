<template>
  <div id="app">
    <router-link
      ref="skiplink"
      to="#main"
      class="skip-to-content-link"
      @click.native="scrollFix('#main')"
    />

    <div class="page">
      <Header />

      <keep-alive>
        <router-view :key="$route.path.substr(1) || 'home'" @update-title="updateTitle" />
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

  @import "scss/normalize.css";
  @import "scss/fonts.scss";

:root {
  --content-width: 65rem;
}

*{

}

*,
*:after,
*:before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;

}

html {
  font-family: Public Sans;

}

body{

  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
  -ms-overflow-style: none;
  -webkit-font-feature-settings: "kern" 1, "liga" 1, "calt" 1;
  -moz-font-feature-settings: "kern=1", "liga=1", "calt=1";
  -moz-font-feature-settings: "kern" 1, "liga" 1, "calt" 1;
  font-feature-settings: "kern" 1, "liga" 1, "calt" 1;
  -webkit-font-smoothing: antialiased !important;
  -moz-osx-font-smoothing: grayscale;

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

h6 {
  font-family: Public Sans;
  font-weight: 100;
  font-variation-settings: 'wght' 100, 'wdth' 85;
  animation: live 3000ms infinite forwards;
  letter-spacing: 0.5px;
}
@keyframes live {

  100% {
    font-variation-settings: 'wght' 100, 'wdth' 85;
  }
  60% {
    font-variation-settings: 'wght' 500, 'wdth' 300;
  }

}
</style>
