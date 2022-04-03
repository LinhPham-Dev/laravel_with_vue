<template>
    <div class="row my-3">
        <div class="col-lg-4">
            <h1 class="text-center">Name: {{ book.title }}</h1>
            <div class="card m-auto">
                <img
                    :src="book.image"
                    width="50px"
                    class="card-img-top"
                    alt="{{ book.title }}"
                />
                <div class="card-body">
                    <h5 class="card-title"><b>Price: $</b> {{ book.price }}</h5>
                    <h5 class="card-title">
                        <b>Release:</b> {{ book.release_date }}
                    </h5>
                    <h5 class="card-title"><b>Page:</b> {{ book.page }}</h5>
                    <p class="card-text">
                        <b>Description:</b> {{ book.description }}
                    </p>
                    <div class="float-end">
                        <a href="#" class="btn btn-warning mx-2">Edit</a>
                        <a href="#" class="btn btn-danger mx-2">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <h1 class="text-center">Version of {{ book.title }}</h1>
            <div class="row my-3">
                <div
                    class="col-lg-4 mb-3"
                    v-for="(bookRelease, index) in bookVersions"
                    :key="index"
                >
                    <BookVersion :bookRelease="bookRelease" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Availability from "./Availability.vue";
import BookVersion from "./BookVersionComponent.vue";
export default {
    components: {
        Availability,
        BookVersion,
    },

    data() {
        return {
            book: null,
            bookVersions: null,
        };
    },

    created() {
        const urlDetail = `/api/books/${this.$route.params.id}`;
        const urlVersionOfThisBook = `/api/books/${this.$route.params.id}/book-version`;

        const detailAxios = axios.get(urlDetail);

        const bookVersionsAxios = axios.get(urlVersionOfThisBook);

        // Call multiple api with axios
        axios
            .all([detailAxios, bookVersionsAxios])
            .then(
                axios.spread((...responses) => {
                    const responseDetail = responses[0];
                    const responseBookVersions = responses[1];

                    this.book = responseDetail.data.book;
                    this.bookVersions = responseBookVersions.data;
                })
            )
            .catch((errors) => {
                console.error(errors);
            });
    },
};
</script>

<style></style>
