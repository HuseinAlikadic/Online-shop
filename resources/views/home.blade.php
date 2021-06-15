@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <Slideshow></Slideshow>

        </div>
        <p>{{Route::currentRouteName()}}</p>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4" v-for="item in kategorijaArray">
                    <osnovna-podjela-uredzaja :husein-kategorija="item" :ruta="mojaRuta">
                    </osnovna-podjela-uredzaja>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
<script>
const app = new Vue({
    el: "#shop",
    name: 'home',
    data: function() {
        return {

            sviUredjajiArray: <?=$stringSviUredjaji  ?>,
            kategorijaArray: <?=$kategorijeUredzaja ?>,
            imeHome: "idemKuci",
            mojaRuta: '<?= Route::currentRouteName()?>'


        };
    },
    mounted() {
        this.proba();
    },
    methods: {
        proba: function() {

        },

    },
});
</script>
@endsection