<template>
    <div class="mt-4">
        <button @click="unlike()" v-if="result">
            いいね解除
        </button>
        <button @click="like()" v-else>
            いいね
        </button>
        <p>いいね数：{{ count }}</p>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data () {
            return {
                count: "",
                result: "false",
            }
        },
        mounted () {
            this.haslike();
            this.countlikes();
        },
        methods: {
            like() {
                axios.get('/posts/' + this.post.id + '/likes')
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            unlike() {
                axios.get('/posts/' + this.post.id + '/unlikes')
                .then(res => {
                    this.result = res.data.result;
                    this.count = res.data.count;
                }).catch(function(error){
                    console.log(error);
                });
            },
            countlikes() {
                axios.get('/posts/' + this.post.id + '/countlikes')
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            haslike() {
                axios.get('/posts/' + this.post.id + '/haslike')
                .then(res => {
                    this.result = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>