/* eslint-disable */
<template>
  <footer class="footer">
    <!--    <nav class="social">-->
    <!--      <a v-for="social in about.social" :key="social.url" :href="social.url"> {{ social.platform }} </a>-->
    <!--    </nav>-->

    <div class="time-location">
      <ul>
        <li id="current-letter">_</li>
        <li id="clock"><digital-clock :display-seconds="true" /></li>

        <li id="ip-address">{{ ciudad }}</li>
        <li id="counter">{{ counter }}</li>
      </ul>
    </div>
    <router-link to="/" @click.native="$root.scrollTop"><span class="copyleft">&copy;</span> {{ new Date().getFullYear() }} / {{ $site.title }}</router-link>
  </footer>
</template>

<script>
import DigitalClock from 'vue-digital-clock'
const moment = require('moment')
require('moment-countdown')
export default {
  name: 'Footer',
  components: {
    DigitalClock
  },
  data () {
    return {
      about: {},
      datenow: '',
      ciudad: '',
      counter: '',
      date: ''

    }
  },
  computed: {

  },
  async created () {
    this.about = await this.$api.getPage('about')
    fetch('https://ipapi.co/json/')
      .then(response => response.json())
      .then(json => {
        this.ciudad = json.city
      })
    this.getTime()
  },
  mounted: function () {
  },
  beforeDestroy () {
    clearInterval(this.counter)
  },
  methods: {
    getTime () {
      this.counter = setInterval(() => {
        const countDownDate = moment('2020-05-09 20:00:00')
        const diff = countDownDate.diff(moment())
        this.counter = moment.utc(diff).format('D [days] HH:mm:ss')
      }, 1000)
    }
  }
}
</script>

<style lang="scss" scoped>
  .red{
    color:red;
  }
.copyleft{
    display:inline-block;
    transform: rotate(180deg);
  }
.footer {
  padding: 1.5rem 5vw 10vh;
  text-align: center;
  max-width: var(--content-width);
  margin: 0 auto;
  line-height: 1.5em;
  a {
    display: inline-block;
    font-size: 0.875rem;
  }
}
.footer > a {
  margin-bottom: 1.5rem;
  width: 16.5rem;
  padding-top: 0.5rem;
}

.social{ a {
  margin: 0 0.75rem;
  padding: 0.5rem 1rem;
  border: 2px solid #000;
  width: 7.5rem;
}
  a:hover {
    background: #000;
    color: #fff;
  }
}

.time-location{
  text-align: left;
  position:fixed;
  bottom:10px;
  left: 10px;
  }
@media (max-width: 768px) {
  .time-location{
    left:4.7vw;
  }
}
</style>
