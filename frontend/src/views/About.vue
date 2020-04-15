<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main">
    <div class="layout">
      <div class="text">
        <span v-html="page.text" />
      </div>
      <aside>
        <!--        <section>-->
        <!--          <h2>Address</h2>-->
        <!--          <div class="text">-->
        <!--            <span v-html="page.address" />-->
        <!--          </div>-->
        <!--        </section>-->

        <section>
          <div class="text">
            <a :href="'mailto:' + page.email">{{ page.email }}</a>
          </div>
        </section>

        <!--        <section>-->
        <!--          <h2>Phone</h2>-->
        <!--          <div class="text">-->
        <!--            <a :href="'tel:' + page.phone">{{ page.phone }}</a>-->
        <!--          </div>-->
        <!--        </section>-->

        <!--        <section>-->
        <!--          <h2>On the web</h2>-->
        <!--          <div class="text">-->
        <!--            <ul>-->
        <!--              <li v-for="social in page.social" :key="social.id">-->
        <!--                <a :href="social.url">{{ social.platform }}</a>-->
        <!--              </li>-->
        <!--            </ul>-->
        <!--          </div>-->
        <!--        </section>-->
      </aside>
    </div>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'About',

  components: {
  },

  mixins: [page]
}
</script>

<style>
  .layout{
    max-width: 40rem;
    margin: 0 auto 6rem;
    text-align: left;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
</style>
