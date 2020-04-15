<template>
  <main id="main">
    <ul v-if="page.children" class="events" :data-even="page.children.length % 2 === 0">
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

export default {
  name: 'Events',

  components: {
  },

  mixins: [page]
}
</script>

<style>
.events {
  display: flex;
  flex-direction: column;
  list-style: none;
  grid-gap: 1rem;
  line-height: 0;
}

@media screen and (min-width: 30em) {
  .events {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media screen and (min-width: 60em) {
  .events {
    grid-template-columns: repeat(3, 1fr);
  }
  .events[data-even] {
    grid-template-columns: repeat(4, 1fr);
  }
}

.events li {
  overflow: hidden;
  background: #000;
}
.events figure {
  position: relative;
  padding-bottom: 125%;
}
.events figcaption {
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
.events img {
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
.events img:hover {
  opacity: 0.2;
}
</style>
