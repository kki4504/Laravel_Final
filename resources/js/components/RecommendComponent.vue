<template>
    <div style="position:static">
        <div class="ml-2 text-2xl block">추천 영화</div>
            <div class="noScroll"  
            style="display: flex; flex-wrap: no-wrap; overflow-x: scroll;
                overflow-y: hidden; width:100%;  height:350px;
                background: linear-gradient(to right, transparent, rgba(0, 0, 0, 1));">
                <!-- {{ results }} -->
                <!-- <div v-for="result in results" :key="result.id">
                    IM ' RELEASE_DATE :{{ result.release_date }}
                </div> -->
                <search-card-component class="m-3" :result="result" v-for="result in results" :key="result.id">
                </search-card-component>
        </div>
    </div>
</template>
<script>
import SearchCardComponent from './SearchCardComponent.vue';

export default {
    components: {
        SearchCardComponent,
    },
    props: [
        'id'
    ],
    data() {
        return {
            results: {}
        }
    },
        mounted () {
            console.log(this.id);
            axios.post('/movies/' + this.id + '/recommendations')
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