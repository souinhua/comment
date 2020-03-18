<template>
    <div class="container py-2">
        <div class="col-md-7 mx-auto">
            <h1>comment...</h1>

            <div class="mb-4" id="container-comments" v-if="!loading">
                <comment v-for="c in comments" :key="c.id" :comment="c" :level="1"></comment>
            </div>

            <div v-if="loading" class="text-center py-5">
                <div class="spinner-grow text-success" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="lead">Write a new comment here to start a new thread</p>
                    <comment-form :comments="comments" :parent="null"></comment-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Comment from '../components/Comment.vue';
    import CommentForm from '../components/CommentForm.vue';

    export default {
        components: {
            'comment': Comment,
            'comment-form': CommentForm
        },
        data: function() {
            return {
                comments: [],
                loading: true
            }
        },
        mounted() {
            // Loads all the comments from the database upon mounted
            axios
                .get('/api/comments')
                .then(r => {
                    this.comments = r.data;
                    this.loading = false;
                });
        }
    }
</script>
