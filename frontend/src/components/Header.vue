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
    <div class="streaming">
      <p class="red" href="http://streamer.nettitila.fi:8000/Station_of_commons" target="_blank" onclick="window.open(this.href,this.target,'width=400,height=400, top=70, left=20'); return false;">Stream in Browser</p>

      <p class="red" href="http://streamer.nettitila.fi:8000/Station_of_commons.m3u">Stream in VLC</p>
    </div>
    <!--    <nav id="menu" class="menu">-->
    <!--      <router-link-->
    <!--        v-for="page in $site.children.filter(page => page.isListed)"-->
    <!--        v-slot="{ href, isExactActive, navigate }"-->
    <!--        :key="page.id"-->
    <!--        :to="`/${page.id}`"-->
    <!--        @click.native="$root.scrollTop"-->
    <!--      >-->
    <!--        <a-->
    <!--          :href="href"-->
    <!--          :aria-current="isExactActive ? 'page' : false"-->
    <!--          @click="navigate"-->
    <!--        >-->
    <!--          {{ page.title }}-->
    <!--        </a>-->
    <!--      </router-link>-->
    <!--    </nav>-->
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss" scoped>
  h1 {
    font-variant-ligatures: discretionary-ligatures common-ligatures;
    font-size: 8rem;
    margin: 0.67em 0;
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 4rem;
      margin: 0.67em 0;
      font-variant-ligatures: discretionary-ligatures common-ligatures;
    }
  }

  .streaming p{

   cursor: pointer;
   margin-bottom: 5px;
   margin-top: 5px;
 }

 .logo {

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
    font-variation-settings: 'wght' 100, 'wdth' 85;
    animation: live 3000ms infinite forwards;
    letter-spacing: 0.5px;
  }

  @keyframes live {

    100% {
      font-variation-settings: 'wght' 100, 'wdth' 85;
    }
    40% {
      font-variation-settings: 'wght' 500, 'wdth' 300;
    }

  }

</style>
