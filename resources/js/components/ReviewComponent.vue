<template>
    <font-awesome-icon
        v-for="star in fullStars"
        :key="'full-' + star"
        :icon="['fas', 'star']"
        @click="$emit('update:value', star)"
    />

    <font-awesome-icon v-if="halfStar" icon="star-half-alt" />

    <font-awesome-icon
        v-for="star in emptyStars"
        :key="'empty-' + star"
        :icon="['far', 'star']"
        @click="$emit('update:value', fullStars + star)"
    />
</template>

<script>
export default {
    props: {
        value: Number,
    },
    emits: ["update:value"],
    computed: {
        halfStar() {
            const fraction = Math.round(
                (this.value - Math.floor(this.value)) * 100
            );

            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.value);
        },
        emptyStars() {
            return 5 - Math.ceil(this.value);
        },
    },
};
</script>
