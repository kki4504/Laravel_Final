<template>
    <div style="position: relative; width: 100%;">
        <div class=""
                v-bind:style="{ 
                    background: 'url(' + url + 'w200' + result.poster_path + ')' ,
                    height: '300px',
                    width: '200px',
                    position: 'relative',
                    bottom: '100px',
                    border: 'solid white',
                    borderRadius : '7px'
                    }">
        </div>
        <div style="position: absolute; top: 10px; left:220px; width: 75%">
            <div style="font-size: xx-large; width: 100%;">
                {{ result.title }} 
            </div>
            <div>
                {{ result.release_date.slice(0, 4) }} ・
                <span v-for="(name, index) in result.genres" :key="index + name.name">
                    {{ name.name }}
                </span> 
                ・
                <span v-for="(countries, index) in result.production_countries" :key="countries.iso_3166_1 + index">
                    {{ countries.iso_3166_1 }}
                </span> 
            </div>
            <div>
                평균 ★
                {{ result.vote_average }}
            </div>
            <div style="position:relative; width:100%;">
                <!-- 플러스 -->
                <div style="position:absolute; top: 40px; right:100px">
                    <button style="width:100px;height:45px;" class="text-l border-2 border:white rounded hover:bg-white hover:text-black">
                        보고싶어요
                    </button>
                </div>
                <div style="position: absolute; top:40px; right:0px">
                    <button style="width:80px;height:45px;" class="text-l border-2 border:white rounded hover:bg-white hover:text-black">
                        <a :href="'/movies/create/' + result.id">
                            코멘트
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <!-- 기본 정보  -->
        <div style="position: absolute; top: 210px; width: 100%;">
            <div style="font-size: x-large">
                기본 정보
            </div>
            <!-- 세부내용 -->
            <div class="mt-3 ml-4" style=" width: auto">
                <div style="font-size: large">
                    {{ result.title }} 
                </div>
                <div class="mt-2 ml-4">
                    <div>
                        {{ result.release_date.slice(0, 4) }} ・
                        <span v-for="(name, index) in result.genres" :key="index">
                            {{ name.name }}
                        </span> 
                        ・
                        <span v-for="(countries, index) in result.production_countries" :key="index">
                            {{ countries.iso_3166_1 }}
                        </span>
                    </div>
                    <div>
                        {{ result.runtime }} 분
                        <span v-if="result.adult"> / <span style="color: red;">청소년 관람 불가</span></span>
                    </div>
                </div>
                <div class="mt-4" style="font-size: large">
                    줄거리
                </div>
                <div class="mt-2 ml-4">
                    {{ result.overview }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components : {
    },
    props : [
        'result'
    ],
    mounted() {
        console.log(typeof(this.result));
    },
    data() {
        return {
            url: 'https://image.tmdb.org/t/p/',
            year: this.result.release_date.slice()
        }
    },
}
</script>
<style scoped>

</style>

