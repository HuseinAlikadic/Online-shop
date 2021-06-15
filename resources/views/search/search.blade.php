@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <form action="/pretrazi" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="naziv">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div>
        <uredzaji :svi_uredzaji="sviPodaci"></uredzaji>
    </div>
</div>
@endsection

@section('javascript')
<script>
const app = new Vue({
    el: '#shop',
    name: 'search',
    data() {
        return {
            sviPodaci: <?=$sviUredzaji ?>,


        }
    },

})
</script>
@endsection