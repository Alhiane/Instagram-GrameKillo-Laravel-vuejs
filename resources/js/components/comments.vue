<template>
    <div>
        <div class="comments">
            <div class="comments-view">
                <ul>
                    <li v-for="comment in comments" :key="comment.id">
                        <span class="user">
                            <img
                                :src="'/storage/' + comment.user.profile.image"
                                alt=""
                            />
                        </span>
                        <span class="comment-body">
                            {{ comment.body }}
                        </span>
                        <span class="like-icon">
                            <i class="icofont-heart"></i>
                        </span>
                        <span class="reply">
                            <i class="icofont-reply"></i>
                        </span>
                    </li>
                    <span class="loading-comment" v-if="loading">
                        <i class="icofont-spinner-alt-6 icofont-pulse"></i>
                    </span>
                </ul>
            </div>
            <div class="comment-form">
                <input
                    type="text"
                    name="comment"
                    placeholder="add a comment"
                    v-model="data.body"
                />
                <button @click="storeComment">
                    <i class="icofont-speech-comments"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["postId", "count"],

    data() {
        return {
            data: {
                body: "",
                postId: this.postId
            },
            commentCount: parseInt(this.count),
            comments: "",
            loading: false
        };
    },

    mounted() {
        if (this.commentCount > 0) {
            this.getAllComments();
        }
    },

    methods: {
        getAllComments() {
            console.log("fetch");
            axios
                .get("/comments/" + this.postId)
                .then(result => {
                    this.comments = result.data;
                })
                .catch(err => {
                    console.log(err.message);
                });
        },

        storeComment() {
            this.loading = true;
            axios
                .post("/comments/" + this.postId, this.data)
                .then(result => {
                    console.log(result.data);
                    this.comments.push(result.data[0]);
                    this.loading = false;
                })
                .catch(err => {
                    err.message;
                });
        }
    }
};
</script>

<style lang="scss" scoped>
.comments-view {
    ul {
        margin: 0;
        padding: 0;
        list-style: none;

        li {
            margin-bottom: 9px;
            .user {
                img {
                    width: 6%;
                    border-radius: 50%;
                }
            }

            .comment-body {
                font-size: 12px;
                padding-left: 5px;
            }

            .like-icon {
                float: right;

                i {
                    text-shadow: 0px 0px 1px #222;
                    color: #fff;
                    cursor: pointer;

                    &.like {
                        color: #ff002f;
                        text-shadow: none;
                    }
                }
            }

            .reply {
                float: right;
                padding-right: 5px;

                i {                    
                    color: #676767;
                    cursor: pointer;
                    
                }
            }
        }
    }

    .loading-comment {
        width: 100%;
        text-align: center;
        display: block;
    }
}
.comments {
    padding: 3px 20px 20px;

    .comment-form {
        display: flex;
        margin-top: 20px;
        input {
            background: #eeeeee59;
            border: 1px solid transparent;
            min-width: fit-content;
            padding: 7px 16px;
            color: #b8b8b8;
            border-radius: 32px;
            flex: 1 1;
        }

        button {
            background: transparent;
            border-color: transparent;
            color: #a6a6a688;
            font-size: 24px;
        }
    }
}</style
>>
