<template>
    <div class="noScroll" style="display: flex; flex-wrap: no-wrap; overflow-x: scroll;
                     overflow-y: hidden; width:100%;  height:350px;">
        <!-- {{ results }} -->
        <!-- <div v-for="result in results" :key="result.id">
            IM ' RELEASE_DATE :{{ result.release_date }}
        </div> -->
        <search-card-component class="m-3 " :result="result" v-for="result in results" :key="result.id">
        </search-card-component>
    </div>
</template>

<script>
import SearchCardComponent from './SearchCardComponent.vue';

export default {
    components: {
        SearchCardComponent
    },
    data() {
        return {
            results: {},
        }
    },
    mounted () {
        axios.post('/movies/popular')
        .then(res => {
            this.results = res.data.results;
            console.log(res);

        })
        .catch(err => {
            console.log(err);
        })
    }
}
</script>
<style scoped>
    .noScroll::-webkit-scrollbar {
        display: none;
    }
</style>
