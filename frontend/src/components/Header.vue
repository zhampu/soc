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
    <audio style="margin: 0 auto; display: block;" class="audio-control align-content-center  " controls=""
           name="media"
    >
      <source src="http://streamer.nettitila.fi:8000/Station_of_commons" type="audio/mpeg">
    </audio>
    <!--    <nav id="menu" class="menu">
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
  </nav>-->
  </header>
</template>

<script >
export default {
  name: 'Header'
}
</script>

<style lang="scss" scoped>

  .header {
    margin-bottom: 1.5rem;

    .red{
      color: red;
    }
  }

  .header a {
    position: relative;
    font-size: 2.875rem;
    letter-spacing: 0.05em;
    padding: 0.5rem 0;
    font-family: Till;
  }

  .header .logo {

    margin-bottom: 1.5rem;
    padding: 0.5rem 0;
  }

  .header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .menu a {
    margin: 0 0.75rem;
  }

  .menu a[aria-current],
  .menu a.router-link-active {
    border-bottom: 2px solid #000;
  }
  h1{
margin-top: 0;
    margin-bottom: 0;
    text-transform: uppercase;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering:optimizeLegibility;
    font-weight: initial;
    line-height: 0.9;
  }

</style>
