<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main">
    <article class="note">
      <header class="note-header intro">
        <h1>{{ page.title }}</h1>
        <time class="note-date">{{ page.date }}</time>
        <p v-if="page.tags" class="note-tags tags">{{ page.tags }}</p>
      </header>

      <div class="note-text text">
        <span v-html="page.text" />
      </div>
    </article>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'Note',

  mixins: [page]
}
</script>

<style scoped>
.note {
  max-width: 35rem;
  margin: 0 auto;
}
.note-header {
  text-align: center;
}
.note-date {
  margin-bottom: 0.5rem;
  display: block;
}

/**
 * Deep selectors for v-html content
 * https://vue-loader.vuejs.org/guide/scoped-css.html#dynamically-generated-content
*/
span >>> .gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
  grid-gap: 1.5rem;
  margin-bottom: 1.5rem;
  padding: 3rem 0;
}
span >>> .gallery figure a {
  border: 0;
}
span >>> .gallery figure {
  margin: 0;
  padding: 0;
}

@media screen and (min-width: 45rem) {
  span >>> .gallery {
    margin-left: -3rem;
    margin-right: -3rem;
  }
}
</style>
