<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-3" v-for="post in posts" :key="post.id">
                    <div class="card-header">
                        {{post.title}}
                        <br>
                        {{post.subtitle}}
                        <br>
                        di {{post.author}}
                    </div>

                    <div class="card-body">
                        Pubblicato il {{post.publication_date}}
                        <br><br>
                        {{post.post_content}}
                        
                        <div v-if="post.category_id">
                            Categoria: {{ postCategory(post.category_id) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                posts: []
            }
        },
        mounted() {
            axios
            .get('/vue/showAllPosts')
            .then(result => {

                this.categories = result.data.categories;
                this.posts = result.data.posts;
            })
            .catch(error => {
                console.log(error);
            });
        },
        methods: {
            postCategory(id) {

                let toReturn = null;
                this.categories.forEach(category => {
                    if(category.id === id) {
                        toReturn = category.name;
                    }
                });
                return toReturn;
            }
        }
    }
</script>
