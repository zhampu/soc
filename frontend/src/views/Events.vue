<template>
  <main id="main">
    <Intro :page-title="page.title" />

    <ul v-if="page.children" class="albums" :data-even="page.children.length % 2 === 0">
      <li v-for="event in page.children" :key="event.id">
        <router-link :to="`/${event.id}`">
          <figure>
            <img :src="event.cover.url" :alt="event.cover.alt">

            <figcaption>{{ event.title }}</figcaption>
          </figure>
        </router-link>
      </li>
    </ul>
  </main>
</template>

<script>
import page from '@/mixins/page'
import Intro from '@/components/Intro.vue'

export default {
  name: 'Events',

  components: {
    Intro
  },

  mixins: [page]
}
</script>

<style>
.albums {
  display: flex;
  flex-direction: column;
  list-style: none;
  grid-gap: 1rem;
  line-height: 0;
}

@media screen and (min-width: 30em) {
  .albums {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media screen and (min-width: 60em) {
  .albums {
    grid-template-columns: repeat(3, 1fr);
  }
  .albums[data-even] {
    grid-template-columns: repeat(4, 1fr);
  }
}

.albums li {
  overflow: hidden;
  background: #000;
}
.albums figure {
  position: relative;
  padding-bottom: 125%;
}
.albums figcaption {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  color: #fff;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  line-height: 1.5em;
  padding: 1rem;
  font-size: 0.875rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.125em;
}
.albums img {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: all 0.3s;
}
.albums img:hover {
  opacity: 0.2;
}
</style>
