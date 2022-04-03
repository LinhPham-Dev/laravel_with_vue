<template>
    <div class="card w-100">
        <img
            :src="book.image"
            width="50px"
            class="card-img-top"
            alt="{{ title }}"
        />
        <div class="card-body">
            <router-link :to="{ name: 'bookDetail', params: { id: book.id } }"
                ><h3 class="card-title text-bold">
                    {{ book.title }}
                </h3></router-link
            >
            <h5 class="card-title"><b>Price: $</b> {{ book.price }}</h5>
            <h5 class="card-title"><b>Release:</b> {{ book.release_date }}</h5>
            <h5 class="card-title"><b>Page:</b> {{ book.page }}</h5>
            <p class="card-text"><b>Description:</b> {{ book.description }}</p>
            <div class="float-end">
                <a href="#" class="btn btn-warning mx-2">Edit</a>
                <a href="#" class="btn btn-danger mx-2">Delete</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:
        // {
        //     id: Number,
        //     title: String,
        //     image: String,
        //     price: Number,
        //     page: Number,
        //     release_date: Date,
        //     description: String,
        // },

        ["book"],
};
</script>

<style></style>
