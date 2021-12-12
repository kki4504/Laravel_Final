<template>
  <div class="justify-center flex flex-wrap">
    <my-index class="m-3" v-for="result in results" :result="result"  :key="result.id">
    </my-index>
  </div>
</template>

<script>
import MyIndex from './MyIndex.vue'
export default {
  components : {
    // ShowMovieComponent,
    MyIndex
  },
  props : [ "results" ],
  data() {
    return {

    }  
  },
  mounted() {
      console.log(typeof(this.results));

  }
}
</script>
