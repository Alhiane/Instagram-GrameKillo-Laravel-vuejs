<template>
    <div class="like-btn">
        <i class="icofont-heart" v-if="!status" @click="likePost"></i>
        <i class="icofont-heart like" v-if="status" @click="likePost"></i>
    </div>
</template>

<script>
export default {
    props: ["like", "postId"],
    data: function() {
        return {
            status: this.like
        };
    },
    methods: {
        likePost() {
            axios
                .post("/like/" + this.postId)
                .then(res => {
                    this.status = !this.status;
                })
                .catch(err => {
                    console.log(err.message);
                });
        }
    }
};
</script>

<style lang="scss" scoped>
.like-btn {
    padding: 8px 9px;

    i {
        font-size: 33px;
        text-shadow: 0 0px 2px #222;
        color: #fff;
        cursor: pointer;

        &.like {
            color: #ff002f;
            text-shadow: none;
        }
    }
}
</style>
