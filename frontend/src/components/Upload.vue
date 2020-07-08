<template>
  <div class="container">
    <div>
      <h1>P2P test</h1>
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

      this.axios.post('http://soc.test/client/api/upload/',
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Access-Control-Allow-Origin': '*'
          }
        }
      ).then(function (data) {
        console.log(data.data)
      })
        .catch(function (error) {
          console.log(error.message)
        })
    },

    onChangeFileUpload () {
      this.file = this.$refs.file.files[0]
    }
  }
}
</script>
