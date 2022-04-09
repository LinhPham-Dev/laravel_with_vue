<template>
    <div class="col-lg-6 mb-3 text-start">
        <h4>{{ review.id }}</h4>
        <Review :value="review.stars" />
    </div>
    <div class="col-lg-6 mb-3 text-end">
        <p>{{ review.content }}</p>
        <p>{{ fromNow(review.created_at) }}</p>
    </div>
</template>

<script>
import moment from "moment";
import Review from "./ReviewComponent.vue";

export default {
    props: ["review"],

    components: {
        Review,
    },

    data() {
        return {};
    },

    methods: {
        fromNow: function (date) {
            return moment(date).fromNow();
        },
    },

    created() {
        // const uri = `/api/books/${this.bookId}/book-reviews`;
        // axios
        //     .get(uri)
        //     .then((result) => {
        //         this.bookReviews = result.data.bookReviews;
        //         this.totalReviews = result.data.bookReviews.length;
        //         result.data.bookReviews.forEach(
        //             (review) => (this.totalStars += review.stars)
        //         );
        //         this.avgStars = Math.round(this.totalStars / this.totalReviews);
        //     })
        //     .catch((err) => {
        //         console.log(err);
        //     });
    },
};
</script>
