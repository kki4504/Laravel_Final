<template>
    <div class="card bg-black">  
        <div class="card-image" style="height:300; width:200">
            <a :href="'/movies/'+result.id + '/edit'" style="hover:text-white text-decoration:none">
                <slot name="image">
                    <img :src="url + result.image" :alt="result.title">
                </slot>
            </a>
        </div>
        <div class="ml-1 mt-3">
            <div class="card-title">
                {{ result.title }}
            </div>
        </div>
        <div class="ml-1 mt-3">
            <div class="card-title">
                {{ result.comment }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : [
        'result'
    ],
    data() {
        return {
            url : 'https://image.tmdb.org/t/p/w200',
        }
    },
    methods : {
    
    }

}
</script>
<style scoped>
    a:hover { 
        text-decoration: none;
        color : white;
     }
</style>