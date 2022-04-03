<template>
    <h2 class="font-bold text-center">Availability</h2>

    <form @submit.prevent="checkSubmit">
        <div class="row mx-auto my-3">
            <div class="col-md-6">
                <input
                    type="date"
                    name="from"
                    class="form-control"
                    id="from"
                    v-model="from"
                    @keyup.enter="check"
                />
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-75">
                    Search
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            from: null,
        };
    },

    methods: {
        check() {
            alert("Method check demo !");
        },

        checkSubmit() {
            alert("Method checkSubmit !");
        },
    },
};
</script>

<style></style>
