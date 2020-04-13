<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main">
    <div class="notes">
      <article v-for="note in page.children" :key="note.id" class="note">
        <header class="note-header">
          <router-link :to="`/${note.id}`">
            <h2>{{ note.title }}</h2>
            <time>{{ note.date }}</time>
          </router-link>
        </header>
      </article>
    </div>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'Notes',

  components: {
  },

  mixins: [page]
}
</script>

<style lang="scss" scoped>
.notes {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
  grid-gap: 1.5rem;
  grid-auto-rows: 1fr;
}
.note {
  border: 2px solid #000;
  a {
    display: block;
    padding: 1rem;
    line-height: 1.25em;
  }
  h2 {
    font-size: 1rem;
  }
  time {
    font-size: 0.75rem;
  }
}

</style>
