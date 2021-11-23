<template>
    <section class="my-3 p-2">
        <h2 class="mb-4">Post:</h2>
       
        <div v-if="isLoading" class="loader">
           
            <div class="spinner-border text-white" role="status" >
               
            </div>
             <span class="text-white loading">Loading...</span>
            
        </div>
         <PostCard v-else v-for="post in posts" :key="post.id"  :post='post'/>
       
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">
                <li v-if="currentPage > 1" class="page-item"><button class="page-link" @click='getPostList(currentPage - 1)' >Precedente</button></li>
                <li v-for="n in lastPage" :key='n' class="page-item" :class="{active : n === currentPage}"><button  class="page-link" @click="getPostList(n)">{{n}}</button></li>
                <li v-if="currentPage < lastPage" class="page-item"><button class="page-link" @click='getPostList(currentPage + 1)' >Successivo</button></li>
            </ul>
        </nav>
    </section>
</template>

<script>
import PostCard from './PostCard.vue'

export default {
    name: 'PostList',
    components:{
        PostCard,
    },
    data(){
        return{
            posts: [],
            baseUri: 'http://127.0.0.1:8000',
            isLoading : false,
            currentPage: null,
            lastPage: null,
        }
    },
    
    methods:{
        getPostList(page){

            this.isLoading=true;
           axios.get(`${this.baseUri}/api/posts/?page=${page}`)
           .then((res)=>{
             
               this.posts=res.data.data;
               this.currentPage = res.data.current_page;
               this.lastPage = res.data.last_page;
               
           })
           .catch((err)=>{
               console.error(err);
           })
           .then(()=>{
               this.isLoading =false;
           });
        }
    },
    created(){
        this.getPostList(1);
    },

}
</script>

<style lang="scss" scoped>

    .loader{
        position: fixed;
        top:0;
        left:0;
        right: 0;
        bottom: 0;
        background-color: rgba(37, 37, 37, 0.911);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9;
    
    }
    .spinner-border{
        width: 250px;
        height: 250px;
    }
    .loading{
        position: fixed;
        top:0;
        left:0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
    }
</style>