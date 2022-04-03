<template>
    <div v-if="isLoading">Loading data ...</div>
    <div v-else>
        <div class="row">
            <div
                class="d-flex align-items-stretch col-md-4 my-3 p-3"
                v-for="book in books"
                :key="book.id"
            >
                <BookItemComponent :book="book" />
            </div>
        </div>
    </div>
</template>

<script>
import BookItemComponent from "./BookItemComponent.vue";
export default {
    components: {
        BookItemComponent,
    },

    created() {
        axios
            .get("api/books")
            .then((result) => {
                this.books = result.data.books;
                this.isLoading = false;
            })
            .catch((err) => {
                console.log(err);
            });
    },

    data() {
        return {
            books: null,
            isLoading: true,
        };
    },
};
</script>
