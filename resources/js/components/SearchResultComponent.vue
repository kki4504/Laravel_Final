<template>
  <div class="noScroll" style="display: flex; flex-wrap: no-wrap; overflow-x: scroll;
                     overflow-y: hidden; width:100%;  height:350px;">
    <search-card-component class="m-3" :result="result" v-for="result in movieJson.results" :key="result.id">
    </search-card-component>
  </div>
</template>

<script>
import SearchCardComponent from './SearchCardComponent.vue';
// import ShowMovieComponent from './ShowMovieComponent.vue';
export default {
  components : {
    // ShowMovieComponent,
    SearchCardComponent,
  },
  props : [ "movieJson" ],
  data() {
    return {

    }  
  },
}
</script>
<style scoped>
    .noScroll::-webkit-scrollbar {
        display: none;
    }
</style>
