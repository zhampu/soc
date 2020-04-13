<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main">
    <Intro :page-title="page.title" />

    <div class="text">
      <span v-html="page.text" />
    </div>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'Default',

  components: {
  },

  mixins: [page]
}
</script>

<style scoped>
.text {
  max-width: 35rem;
  margin: 0 auto;
}
</style>
