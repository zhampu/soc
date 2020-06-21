<template>
  <!-- eslint-disable vue/no-v-html -->
  <main id="main" class="event">
    <article>
      <header>
        <figure v-if="page.cover" class="cover">
          <img :src="page.cover.url" :alt="page.cover.alt">
          <figcaption>
            <h2 v-if="page.toggle === 'true' ">{{ page.title }}</h2>
            <ul v-else class="artist-list">
              <li v-for="guests in page.guests" :key="guests.id">
                <span>{{ guests.time }}</span> <a :href="guests.url">{{ guests.name }}</a>
              </li>
            </ul>
          </figcaption>
        </figure>
        <video v-if="page.toggle === 'true'" controls="controls" autoplay="autoplay">
          <source :src="page.streamurl" type="video/webm">
          <source src="http://streamer.nettitila.fi:8000/video1" type="video/MP2T">
          <source src="http://streamer.nettitila.fi:8000/video1.m3u" type="video/MP2T">
          <source src="http://streamer.nettitila.fi:8000/Station_of_commons_video" type="video/webm">


        </video>
      </header>
      <div class="text">
        <ul v-if="page.toggle ==='true'">
          <li v-for="guests in page.guests" :key="guests.id">
            <span>{{ guests.time }}</span> <a :href="guests.url">{{ guests.name }}</a>
          </li>
        </ul>
        <div v-html="page.description" />
        <div v-html="page.editor" />
        <!--        <div v-html="page.editor" />-->
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
      <!--      </ul>-->
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

<style lang="scss">

  .artist-list{
    font-size: 3.5rem;
    font-family: Till;
    text-align: left;
    letter-spacing: 0.03em;
    li{
      margin: 10px;
    }
  }
  blockquote {
    font-family: Till;
    margin-bottom: 50px;
    margin-top: 50px;
    text-transform: uppercase;
    line-height: 1;
    font-size: 2em;

     p {
      line-height: 1;
    }
  }
  h3{
    font-weight: normal;
  }
  h2 {
    text-transform: uppercase;
    font-size: 4.5rem;
    font-weight: initial;
    font-family: Till;
  }
  @media (max-width: 768px) {
  h2 {
      font-size: 2.5rem;
    }
    .artist-list{
      font-size: 1.5rem;
      font-family: Till;
      text-align: center;
      li{
        margin: 10px;
      }
    }
  }
  .event {
    /*max-width: 40rem;*/
    /*margin: 0 auto 6rem;*/
    text-align: left;
  }

  .cover {
    position: relative;
    line-height: 0;
    margin-bottom: 6rem;
    background: #000;
    padding-bottom: 75%;

    figcaption {
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

    img {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      box-shadow: 0 0 15px rgba(0, 0, 0, .25);
    }

  }

  .text {
    max-width: 45rem;
    margin: 0 auto 6rem;
    text-align: left;

    figure{
      margin-top: 50px;
      margin-bottom: 50px;
    }
    img{
      width: 100%;

    }

    h1 {
      margin-bottom: 0;
      font-weight: normal;
    }
    a{
      font-variation-settings: 'wght' 700;
    }
  }

  ol {
    list-style: none;
    counter-reset: Acounter;

    li {
      counter-increment: Acounter;
      display: inline-block;
      p{
        display: inline-block;
        margin-bottom: 0;
        margin-top: 0;
      }
    }

    li::before {
      content: counter(Acounter) ". ";
      font-family: Till;
    }
  }
video{
  margin-left: auto;
  margin-right: auto;
  display: block;
  margin-bottom: 40px;
  width: 100%;
}

</style>
