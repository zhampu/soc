<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main" class="album">
    <article>
      <header>
        <figure v-if="page.cover" class="album-cover">
          <img :src="page.cover.url" :alt="page.cover.alt">

          <figcaption>
            <h1>{{ page.headline }}</h1>
          </figcaption>
        </figure>
      </header>

      <div class="album-text text">
        <h1>{{ page.headline }}</h1>
        <span v-html="page.description" />
        <span v-html="page.editor" />
        <!--        <p v-if="page.tags" class="album-tags tags">{{ page.tags }}</p>-->
      </div>

      <!--            <ul v-if="page.gallery" class="album-gallery" :data-even="page.gallery.length % 2 === 0" :data-count="page.gallery.length">-->
      <!--              <li v-for="image in page.gallery" :key="image.url">-->
      <!--                <figure>-->
      <!--                  <a :href="image.link">-->
      <!--                    <img :src="image.url" :alt="image.alt">-->
      <!--                  </a>-->
      <!--                </figure>-->
      <!--              </li>-->
      <!--            </ul>-->
    </article>
  </main>
</template>

<script>
import page from '@/mixins/page'

export default {
  name: 'Event',

  mixins: [page]
}
</script>

<style>
.album-cover {
  position: relative;
  line-height: 0;
  margin-bottom: 6rem;
  background: #000;
  padding-bottom: 75%;
}
.album-cover figcaption {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.5);
  text-align: center;
  color: #fff;
  line-height: 1;
  padding: 1.5rem;
}
.album-cover img {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.album-cover h1 {
  font-size: 5rem;
  font-weight: initial;
  font-family: Till;
}
.album-text {
  max-width: 40rem;
  margin: 0 auto 6rem;
  text-align: left;
}

</style>
