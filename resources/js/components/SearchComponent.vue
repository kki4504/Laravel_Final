<template>
<div class="flex items-center justify-center">
    <div class="flex rounded justify-center" style="width:100%">
        <label for="search">
            <svg style="width:30px;height:30px" class="mt-2 mr-2" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
            </svg> 
        </label>
        <input v-model="search" class="focus:ring-2 focus:ring-white focus:bg-black text-black text-2xl bg-white" style="width: 50%">
        <button @click="getMovies" class="px-4 mx-3 bg-black-600 border-2 border-white-100 text-lg rounded hover:bg-white hover:text-black"
            >
            검색
        </button>
    </div>
</div>
</template>

<script>
// import { defineComponent } from '@vue/composition-api'

export default {
    data() {
        return {
            search : '',
            movies : {},
        }
    },
    methods: {
        getMovies () {
            // console.log(this.search);
            axios
                .post('/search/movies', {
                    'search' : this.search
                })
                .then(res => {
                    // console.log(res);
                    this.movies = res.data;
                    console.log(this.movies);
                    this.$emit("getMovies", this.movies);
                })
                .catch(err => {
                    console.log (err);
                })
        }
    }
}
</script>
