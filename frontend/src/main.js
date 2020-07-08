import Vue from 'vue'
import App from '@/App.vue'
import Router from '@/setup/router'
import KirbyApi from '@/api/kirby'
// import '@/setup/registerServiceWorker'
import '@/setup/plugins'
import 'normalize.css'
import VueMatomo from 'vue-matomo'
import moment from 'moment'
import VueCountdown from '@xkeshi/vue-countdown'
import VueFileAgent from 'vue-file-agent'
import VueAxios from 'vue-axios'
import axios from 'axios'
Vue.use(VueFileAgent)
Vue.use(VueAxios, axios)
Vue.component(VueCountdown.name, VueCountdown)
Vue.prototype.moment = moment
Vue.use(VueMatomo, {
  host: 'https://track.juangomez.co/',
  siteId: 4,
  enableLinkTracking: true,
  requireConsent: false,
  trackInitialView: true,
  trackerFileName: 'piwik',
  debug: true
})
Vue.config.productionTip = false

;(async () => {
  const home = await KirbyApi.getPage('home')
  const router = await Router.init(home.site)

  Vue.prototype.$api = KirbyApi
  Vue.prototype.$home = home
  Vue.prototype.$site = home.site

  new Vue({
    router,

    computed: {
      isHomePage () {
        return this.$route.name === 'home'
      }
    },

    methods: {
      scrollTop () {
        window.scrollTo(0, 0)
      }
    },

    render: h => h(App)
  }).$mount('#app')
})()
