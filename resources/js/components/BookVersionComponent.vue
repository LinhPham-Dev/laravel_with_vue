<template>
    <div class="card w-100 m-auto">
        <div class="card-body">
            <h4 class="text-center">
                <b>{{ bookRelease.name }}</b>
            </h4>
            <h5 class="card-title">
                <b>Reprint:</b> {{ bookRelease.reprint_date }}
            </h5>
        </div>
    </div>
</template>

<script>
export default {
    props: ["bookRelease"],
};
</script>
