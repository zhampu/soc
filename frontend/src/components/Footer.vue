/* eslint-disable */
<template>
  <footer class="footer">
    <!--    <nav class="social">-->
    <!--      <a v-for="social in about.social" :key="social.url" :href="social.url"> {{ social.platform }} </a>-->
    <!--    </nav>-->

    <div class="time-location">
      <ul>
        <li id="current-letter">_</li>
        <li id="clock">{{ datenow }}</li>
        <li id="coordinates">
          <div v-if="errorStr">
            Sorry, but the following error
            occurred: {{ errorStr }}
          </div>

          <div v-if="gettingLocation">
            <i>Getting your location...</i>
          </div>

          <div v-if="location">
            {{ location.coords.latitude }}, {{ location.coords.longitude }}
          </div>
        </li>
        <li id="ip-address">Your City</li>
      </ul>

      <!--        <button type="button" class="btn btn-primary col-1">STREAM</button>-->
    </div>
    <router-link to="/" @click.native="$root.scrollTop"><span class="copyleft">&copy;</span> {{ new Date().getFullYear() }} / {{ $site.title }}</router-link>
  </footer>
</template>

<script>
import moment from 'moment'
export default {
  name: 'Footer',

  data () {
    return {
      about: {},
      datenow: '',
      location: null,
      gettingLocation: false,
      errorStr: null
    }
  },
  async created () {
    this.about = await this.$api.getPage('about')
    if (!('geolocation' in navigator)) {
      this.errorStr = 'Geolocation is not available.'
      return
    }
    this.gettingLocation = true
    // get position
    navigator.geolocation.getCurrentPosition(pos => {
      this.gettingLocation = false
      this.location = pos
    }, err => {
      this.gettingLocation = false
      this.errorStr = err.message
    })
    let ciudad
    fetch('https://ipapi.co/json/')
      .then(function (response) {
        return response.json()
      })
      .then(function (data) {
        console.log(data)
        ciudad = data.city
        document.querySelector('#ip-address').innerHTML = ciudad
      })
  },
  mounted: function () {
    this.time()
  },
  methods: {
    time () {
      var self = this
      this.datenow = moment().format('hh:mm:ss a')
      setInterval(self.time, 1000)
    }
  }
}
</script>

<style>
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
}
.footer a {
  display: inline-block;
  font-size: 0.875rem;
}
.footer > a {
  margin-bottom: 1.5rem;
  border-top: 2px solid #000;
  width: 16.5rem;
  padding-top: 0.5rem;
}

.social a {
  margin: 0 0.75rem;
  padding: 0.5rem 1rem;
  border: 2px solid #000;
  width: 7.5rem;
}
.social a:hover {
  background: #000;
  color: #fff;
}
.time-location{
  text-align: left;
  position:fixed;
  top:87vh;
  left:1vw;
  }
</style>
