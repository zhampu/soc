<template>
  <!--    <div>-->
  <!--      <h1>P2P test</h1>-->
  <!--      <label>File-->
  <!--        <input id="file" ref="file" type="file" @change="onChangeFileUpload()">-->
  <!--      </label>-->
  <!--      <button @click="submitForm()">Upload</button>-->
  <!--    </div>-->
  <iframe src="https://staging.stationofcommons.org/uploads/files/" width="100%" />
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

      this.axios.post('http://staging.stationofcommons.org/uploads/upload.php',
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

<style lang="scss" scoped>
  iframe {
    padding: 0;
    margin: 0;
    border:none;
  }
</style>
