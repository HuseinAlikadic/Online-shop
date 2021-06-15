<template>
    <div>
        <div class="alert alert-primary">
            <strong>{{ pojedinacni_uredjaji.cijena }}</strong>
            <strong>{{ pojedinacni_uredjaji.opis }}</strong>
        </div>
    </div>
</template>
<script>
export default {
    name: "Proba",
    props: { pojedinacni_uredjaji: Object, ime_proba: String },
    data() {
        return {};
    },

    mounted() {},
    methods: {}
};
</script>
