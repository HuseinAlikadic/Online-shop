@extends('layouts.app')

@section('content')

<div class="container">

    <h1> @{{opisArtikla.naziv}}</h1>
    <h4>@{{opisArtikla.stanje}}</h4>
    <h4>@{{opisArtikla.cijena}}</h4>
    <h4>@{{opisArtikla.opis}}</h4>

    <button type="button" class="btn btn-primary" @click="editUredzaj()">
        Edit
    </button>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit informacije:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="/editInformacije" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" :value="editArray.idUredzaji">
                        <div class="form-group">
                            <label for="usr">Naziv:</label>
                            <input type="text" class="form-control" v-model="editArray.naziv" name="naziv">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Stanje:</label>
                            <select class="form-control" v-model="editArray.id_stanje" name="stanje_id">
                                <option value="">Select</option>
                                <option :value="item.id" v-for="item in stanje">@{{item.stanje}}</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Kategorija:</label>
                            <select class="form-control" v-model="editArray.id_karegorija" name="kategorija_id">
                                <option value="">Select</option>
                                <option :value="item.id" v-for="item in kategorija">@{{item.kategorija}}</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="usr">Cijena:</label>
                            <input type="number" class="form-control" v-model="editArray.cijena" name="cijena">
                        </div>
                        <div class="form-group">
                            <label for="usr">Opis:</label>
                            <input type="text" class="form-control" v-model="editArray.opis" name="opis">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>



@endsection

@section('javascript')
<script>
const app = new Vue({
    el: '#shop',
    name: 'opis-uredzaja',
    data() {
        return {
            opisArtikla: <?=json_encode($dodatne_informacije) ?>,
            stanje: <?=$uredzajiStanje ?>,
            kategorija: <?=$uredzajiKategorija ?>,
            editArray: {},

        }
    },
    methods: {
        editUredzaj: function() {

            this.editArray = this.opisArtikla;

            $('#myModal').modal('toggle');

        }
    },

})
</script>
@endsection