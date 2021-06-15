@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <a href="/kategorija"><button type="button" class="btn btn-primary">Kategorija</button></a>
        <a href="/stanje"> <button type="button" class="btn btn-primary">Stanje</button></a>
        <a href="/sviPodaci"> <button type="button" class="btn btn-primary">Svi podaci</button></a>
    </div>

    @endsection

    @section('javascript')
    <script>
    const app = new Vue({
        el: '#shop',
        name: 'admin',
        data() {
            return {


            }
        },

    })
    </script>
    @endsection