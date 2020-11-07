<template>
    <div>
        <button
            class="btn btn-primary"
            @click="follow"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["userId", "follows"],

    data: function() {
        return {
            status: this.follows
        };
    },

    methods: {
        follow: function() {
            axios
                .post("/follow/" + this.userId)
                .then(response => {
                    console.log(response.data);
                    this.status = !this.status;
                    this.buttonText();
                })
                .catch(error => {
                    if(error.response.status == '401'){
                        window.location = '/login';
                    }
                });
        }
    },

    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        }
    }
};
</script>
