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
                posts: []
            }
        },
        mounted() {
            axios
            .get('showAllPosts')
            .then(result => {
                console.log(result.data);
                this.posts = result.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
</script>
