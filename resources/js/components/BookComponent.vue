<template>
    <div v-for="(book, index) in books">
        <BookItemComponent
            :title="book.title"
            :price="book.price"
            :onStock="book.onStock"
            :key="index"
        />
    </div>
</template>

<script>
import BookItemComponent from "./BookItemComponent.vue";
export default {
    components: {
        BookItemComponent,
    },

    data() {
        return {
            books: [
                {
                    title: "Harry Potter",
                    price: 10000,
                    onStock: true,
                },
                {
                    title: "Tiny Habits",
                    price: 23000,
                    onStock: false,
                },
                {
                    title: "The Earth",
                    price: 42300,
                    onStock: true,
                },
            ],
        };
    },
};
</script>
