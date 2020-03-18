<template>
    <form v-on:submit.prevent="post()">
        <input :disabled="submitting" type="text" v-on:keyup="errors.reset('name')" :class="errors.has('name')?'is-invalid':''" class="form-control mb-1" placeholder="Your name" v-model="comment.name">
        <span class="invalid-feedback" v-if="errors.has('name')">{{ errors.first('name') }}</span>

        <div class="input-group">
            <textarea class="form-control" :disabled="submitting"  v-on:keyup="errors.reset('comment')" :class="errors.has('comment')?'is-invalid':''" rows="1" placeholder="Your comment here..." v-model="comment.comment"></textarea>
            <div class="input-group-append">
                <button :disabled="submitting" class="btn btn-success px-4 font-weight-bold" type="submit">
                    <span v-if="submitting" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Post
                </button>
            </div>
        </div>
        <span class="invalid-feedback" v-if="errors.has('comment')">{{ errors.first('comment') }}</span>
    </form>
</template>

<script>
    import {FormError} from '../library/FormError';

    export default {
        props: ['parent', 'comments'],
        data: function() {
            return {
                comment: {},
                errors: new FormError([]),
                submitting: false
            }
        },

        methods: {

            /**
             * Post a new comment to the API
             */
            post: function() {
                this.submitting = true;

                /** If a parent is passed, then the comment created shall pass the parent_id  */
                if(this.parent !== null) {
                    this.comment.parent_id = this.parent.id;
                }

                axios
                    .post('/api/comments', this.comment)
                    .then(r => {
                        this.comments.push(r.data.data);
                        this.comment = {};

                        // Toggles the form from parent Comment component
                        this.$emit('toggle');

                        this.submitting = false;
                    })
                    .catch(e => {
                        if(e.response.status == 422) {
                            /** When 422 occurs, use my custom error handler for form validation */
                            this.errors = new FormError(e.response.data.errors);
                        }
                        this.submitting = false;
                    });
            }
        }
    }
</script>
