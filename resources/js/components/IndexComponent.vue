<template>
    <div>
        <div>
            <search-component @getMovies="getMovies" />
        </div>
        <!-- <div>{{ movieJson }}</div> -->
        <div>
            <div class="ml-2 text-2xl">인기 영화</div>
            <popular />
        </div>
        <div>
            <div class="ml-2 text-2xl">검색 결과</div>
            <search-result-component :movieJson = "movieJson" />
        </div>
    </div>
</template>
<script>
import Popular from './Popular.vue';
import SearchComponent from './SearchComponent.vue'
import SearchResult from './SearchResultComponent.vue';

export default {
    name: "IndexComponent",
    components : {
        SearchComponent,
        SearchResult,
        Popular,
    },
    data() {
        return {
            movieJson : {},
            getMoviesBool : false,
        };
    },
    methods: {
        getMovies (movies) {
            console.log(movies);
            this.movieJson = movies;
            // 부모 = 자식
            this.getMoviesBool != this.getMoviesBool;
        },
    }
}
</script>
