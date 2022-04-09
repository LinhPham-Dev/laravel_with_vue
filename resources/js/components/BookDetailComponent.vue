<template>
    <div class="row my-3">
        <div class="col-lg-5">
            <h1 class="text-center">Name : {{ book.title }}</h1>
            <div class="card m-auto">
                <img
                    :src="book.image"
                    width="50px"
                    class="card-img-top"
                    alt="{{ book.title }}"
                />
                <div class="card-body">
                    <h5 class="card-title">
                        <div class="float-start">
                            <b>Price : $</b> {{ book.price }}
                        </div>
                        <div class="float-end d-flex">
                            <b>Stars :</b> <StarRating :stars="avgStars" />
                        </div>
                    </h5>
                    <div class="clearfix"></div>
                    <h5 class="card-title">
                        <b>Release :</b> {{ book.release_date }}
                    </h5>
                    <h5 class="card-title"><b>Page:</b> {{ book.page }}</h5>
                    <p class="card-text">
                        <b>Description :</b> {{ book.description }}
                    </p>
                    <div class="float-end">
                        <a href="#" class="btn btn-warning mx-2">Edit</a>
                        <a href="#" class="btn btn-danger mx-2">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <h1 class="text-center text-decoration-underline">
                Version of {{ book.title }}
            </h1>
            <div class="row my-3">
                <div
                    class="col-lg-6 mb-3"
                    v-for="(bookRelease, index) in bookVersions"
                    :key="index"
                >
                    <BookVersion :bookRelease="bookRelease" />
                </div>
            </div>

            <h1 class="text-center text-decoration-underline">Reviews</h1>
            <div
                class="row my-3 border-bottom border-2 p-2 mt-2"
                v-for="(review, index) in bookReviews"
                :key="index"
            >
                <BookReview :review="review" />
            </div>
        </div>
    </div>
</template>

<script>
import Availability from "./Availability.vue";
import BookVersion from "./BookVersionComponent.vue";
import BookReview from "./BookReviewComponent.vue";
import StarRating from "../shared/components/StarRating.vue";
export default {
    components: {
        Availability,
        BookVersion,
        BookReview,
        StarRating,
    },

    data() {
        return {
            book: null,
            bookVersions: null,
            bookReviews: null,
            avgStars: 0,
            totalReviews: 0,
            totalStars: 0,
        };
    },

    created() {
        const urlBookDetail = `/api/books/${this.$route.params.id}`;
        const urlVersionsOfThisBook = `/api/books/${this.$route.params.id}/book-versions`;
        const urlReviewsOfThisBook = `/api/books/${this.$route.params.id}/book-reviews`;

        const bookDetailAxios = axios.get(urlBookDetail);
        const bookVersionsAxios = axios.get(urlVersionsOfThisBook);
        const bookReviewsAxios = axios.get(urlReviewsOfThisBook);

        // Call multiple api with axios
        axios
            .all([bookDetailAxios, bookVersionsAxios, bookReviewsAxios])
            .then(
                axios.spread((...responses) => {
                    const responseDetail = responses[0];
                    const responseBookVersions = responses[1];
                    const responseBookReviews = responses[2];

                    this.book = responseDetail.data.book;
                    this.bookVersions = responseBookVersions.data;
                    this.bookReviews = responseBookReviews.data.bookReviews;

                    // Calculator Avg Stars
                    this.totalReviews = this.bookReviews.length;
                    this.bookReviews.forEach(
                        (review) => (this.totalStars += review.stars)
                    );
                    this.avgStars = Math.round(
                        this.totalStars / this.totalReviews
                    );
                })
            )
            .catch((errors) => {
                console.error(errors);
            });
    },
};
</script>

<style></style>
