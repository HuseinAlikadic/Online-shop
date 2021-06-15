<template>
    <div>
        <div class="alert alert-danger">
            <strong>{{ huseinKategorija.kategorija }}</strong>
        </div>
        <div>
            <a :href="'/uredzaji/' + huseinKategorija.id">
                <button type="button" class="btn btn-light">
                    Više
                </button></a
            >
        </div>
        <div v-show="showNesto">
            <p>jjjjjjjj</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Kategorije",
    props: { huseinKategorija: Object, ruta: String },
    data() {
        return {
            showNesto: true
        };
    },
    methods: {},

    mounted() {
        if (this.ruta == true) {
            this.showNesto = true;
        } else {
            this.showNesto = false;
        }
    },
    methods: {}
};
</script>
