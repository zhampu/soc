<template>
  <div class="container">
    <div class="large-12 medium-12 small-12 cell">
      <h1>Vue JS Axios - Image Upload using PHP API - ItSolutionStuff.com</h1>
      <label>File
        <input id="file" ref="file" type="file" @change="onChangeFileUpload()">
      </label>
      <button @click="submitForm()">Upload</button>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      file: ''
    }
  },

  methods: {
    submitForm () {
      const formData = new FormData()
      formData.append('file', this.file)

      this.axios.post('http://localhost:8080/api.php',
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
      ).then(function (data) {
        console.log(data.data)
      })
        .catch(function () {
          console.log('FAILURE!!')
        })
    },

    onChangeFileUpload () {
      this.file = this.$refs.file.files[0]
    }
  }
}
</script>
