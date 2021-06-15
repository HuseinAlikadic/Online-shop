@extends('layouts.app')

@section('content')

<div class="container">

    <div>


        <div class="card-columns ">
            @foreach($pretrazi as $item)
            <div class="card bg-primary">

                <div class="card-body text-center">
                    <p class="card-text">{{$item->naziv}}</p>
                    <p class="card-text">{{$item->cijena}}</p>
                </div>
                <a class="btn btn-success">
                    Dodatni opis</a>

            </div>
            @endforeach
        </div>

    </div>

</div>
@endsection

@section('javascript')
<script>
const app = new Vue({
    el: '#shop',
    name: 'search_uredzaji',
    data() {
        return {

            pretrazi: <?=$pretrazi?>,

        }
    },

})
</script>
@endsection