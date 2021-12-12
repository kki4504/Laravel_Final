<template>
    <div class="card bg-black " style="width: 120px;height: 50px;flex: 0 0 auto;">
        <a :href="'/movies/show/'+result.id" style="hover:text-white text-decoration:none">
            <div class="h-53" style="height:300;">
                <img :src="url + result.poster_path" style="height:300;" :alt="result.title">
                <!-- <search-modal 
                        class="transition-opacity"
                        :url="url" :result="result" 
                        @close="closeModal" v-if="modal" /> -->
            </div>
            <div class="ml-1 mt-3">
                <div class="card-title">
                    {{ result.title }}
                </div>
            </div>
            <div class="ml-1 mt-2">
                {{ result.release_date.slice(0, 4) }}       
            </div>
            <div class="ml-1 mt-2">
                평균 ★ {{ result.vote_average }}
            </div>
        </a>
    </div>

</template>

<script>
export default {
    components : {
    },
    props : [
        'result'
    ],
    data() {
        return {
            modal: false,
            message: '',
            url : 'https://image.tmdb.org/t/p/w200',
            currentYear : new Date().getFullYear(),
        }
    },
    methods : {
    // openModal() {
    //   this.modal = true
    // },
    // closeModal() {
    //   this.modal = false
    // },
    // doSend() {
    //   if (this.message.length > 0) {
    //     alert(this.message)
    //     this.message = ''
    //     this.closeModal()
    //   } else {
    //     alert('메시지를 입력해주세요.')
    //   }
    // }
    }

}
</script>
<style scoped>
    a:hover { 
        text-decoration: none;
        color : white;
     }
</style>