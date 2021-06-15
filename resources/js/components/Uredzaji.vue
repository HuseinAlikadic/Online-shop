<template>
    <div>
        <div class="card-columns ">
            <div
                class="card bg-primary"
                v-for="elemenat in svi_uredzaji"
                :key="elemenat.id"
            >
                <div class="card-body text-center">
                    <p class="card-text">{{ elemenat.naziv }}</p>
                    <p class="card-text">{{ elemenat.cijena }}KM</p>
                </div>
                <a
                    :href="'/informacije/' + elemenat.uredzajiId"
                    class="btn btn-success"
                >
                    Dodatni opis</a
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Uredzaji-vue",
    props: { svi_uredzaji: Array },
    data() {
        return {};
    },
    methods: {},

    mounted() {},
    methods: {}
};
</script>
