<template>
    <h4>
        Book Item {{ title }} - {{ price }} -
        {{ onStock ? "On Stock" : "Out off stock" }}
    </h4>
</template>

<script>
export default {
    props: {
        title: String,
        price: Number,
        onStock: Boolean,
    },
};
</script>

<style></style>
