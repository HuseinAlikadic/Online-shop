@extends('layouts.app')

@section('content')

<div class="container">
    <!-- <b>@{{kategorija}}</b>


    <div class="card-columns">
        <div class="card bg-primary " v-for="item in uredzajiArray">
            <div class="card-body text-center">
                <p class="card-text">@{{item.naziv}}</p>
                <p class="card-text">@{{item.cijena}} KM</p>
            </div>
            <a class="btn btn-success" :href="'/informacije/'+item.uredzajiId"> Dodatni opis</a>
        </div>
    </div> -->


    <p>@{{kategorija}}</p>
    <uredzaji :svi_uredzaji="uredzajiArray"></uredzaji>




</div>

@endsection

@section('javascript')
<script>
const app = new Vue({
    el: '#shop',
    name: 'uredzaji',
    data() {
        return {
            uredzajiArray: <?=$svi_uredzaji ?>,
            kategorija: '<?=$nazivKategorije ?>',
            mojaRuta: '<?= Route::currentRouteName()?>',



        }
    },

})
</script>
@endsection