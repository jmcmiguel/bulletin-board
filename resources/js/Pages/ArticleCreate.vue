<template>
    <h1>CREATE AN ARTICLE</h1>

    <form @submit.prevent="storeArticle">
        <input v-model="form.title" type="text" name="article_title" />
        <input v-model="form.content" type="text" name="article_content" />
        <button type="submit">Post</button>
    </form>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    },

    data() {
        return {
            form: this.$inertia.form({
                title: "",
                content: "",
            }),
        };
    },

    methods: {
        storeArticle() {
            this.form.post("/article/storeArticle").then((response) => {
                console.log("success:", response.data);
                this.form.reset();
            });
        },
    },
};
</script>
