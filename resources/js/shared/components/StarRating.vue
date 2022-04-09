<template>
    <div class="d-flex flex-row-reverse">
        <div v-for="star in stars" :key="star">
            <font-awesome-icon icon="star" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        stars: Number,
    },
};
</script>

<style></style>
