@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        @if (session('uspijesno'))
        <div class="alert alert-success" role="alert">
            {{ session('uspijesno') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <p>Podaci o uredzajima:</p>
            </div>
            <div class="col-md-6">
                <a href="/admin"> <button type="button" class="btn btn-light float-right ml-5">Back</button></a>
                <button type="button" class="btn btn-secondary float-right" data-target="#dodajUredzaj"
                    @click="dodajUredzaj()">Dodaj
                    stanje</button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rbr.</th>
                    <th>Naziv</th>
                    <th>Kategorija</th>
                    <th>Stanje</th>
                    <th>Cijena</th>
                    <th>Opis</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item,index in sviPodaci">
                    <td>@{{index +1}}</td>
                    <td>@{{item.naziv}}</td>
                    <td>@{{item.kategorija}}</td>
                    <td>@{{item.stanje}}</td>
                    <td>@{{item.cijena}}</td>
                    <td>@{{item.opis}}</td>
                    <td><i class="fas fa-edit" data-target="#editujSvePodatke" @click="editujPodatke(index)"></i></td>
                    <td><i class="fas fa-trash-alt" data-target="#obrisiUredzaj" @click="izbrisiUredzaj(index)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Modal za editovanje -->
    <div class="modal" id="editujSvePodatke">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="/editSvePodatke" method='POST'>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" v-model="sviPodaciObject.id" name="id">
                        <div class="form-group">
                            <label for="usr">Naziv:</label>
                            <input type="text" class="form-control" v-model="sviPodaciObject.naziv" name="naziv">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" v-model="sviPodaciObject.kategorija_id" name="kategorija_id">
                                <option value="">Select</option>
                                <option :value="item.id" v-for="item in kategorijaArray">@{{item.kategorija}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" v-model="sviPodaciObject.stanje_id" name="stanje_id">
                                <option value="">Select</option>
                                <option :value="element.id" v-for="element in uredzajiStanjeArray">@{{element.stanje}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">Cijena:</label>
                            <input type="number" class="form-control" v-model="sviPodaciObject.cijena" name="cijena">
                        </div>
                        <div class="form-group">
                            <label for="usr">Opis:</label>
                            <input type="text" class="form-control" v-model="sviPodaciObject.opis" name="opis">
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

    <!-- Modal za potvrdu brisanja -->
    <div class="modal" id="obrisiUredzaj">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="/obrisiUredzaj" method='POST'>
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" :value="sviPodaciObject.id" name="id">
                        <p>Da li ste sigurni da zelite da izbrišete <b>@{{sviPodaciObject.naziv}}</b> ?</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Izbrisi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal za dodavanje uredzaja -->
    <div class="modal" id="dodajUredzaj">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="/dodajUredzaje" method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" :value="sviPodaci.id" name="id">
                        <div class="form-group">
                            <label for="usr">Naziv:</label>
                            <input type="text" class="form-control" :value="sviPodaci.naziv" name="naziv">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Odaberite kategoriju:</label>
                            <select class="form-control" :value="sviPodaci.kategorija_id" name="kategorija_id">
                                <option value="">Select</option>
                                <option :value="element.id" v-for="element in kategorijaArray">@{{element.kategorija}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Odaberite stanje:</label>
                            <select class="form-control" :value="sviPodaci.stanje_id" name="stanje_id">
                                <option value="">Select</option>
                                <option :value="item.id" v-for="item in uredzajiStanjeArray">@{{item.stanje}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">Opis:</label>
                            <input type="text" class="form-control" :value="sviPodaci.opis" name="opis">
                        </div>
                        <div class="form-group">
                            <label for="usr">Cijena:</label>
                            <input type="number" class="form-control" :value="sviPodaci.cijena" name="cijena">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Dodaj</button>
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
    name: 'admin-svi-podaci',
    data() {
        return {
            sviPodaci: <?=$sviPodaci ?>,
            sviPodaciObject: {},
            kategorijaArray: <?=$kategorijaArray?>,
            uredzajiStanjeArray: <?=$stanjeArray?>

        }
    },
    methods: {
        editujPodatke: function(index) {

            this.sviPodaciObject = this.sviPodaci[index];
            $('#editujSvePodatke').modal('toggle');
        },
        izbrisiUredzaj: function(index) {
            this.sviPodaciObject = this.sviPodaci[index];
            $('#obrisiUredzaj').modal('toggle');
        },
        dodajUredzaj: function() {
            $('#dodajUredzaj').modal('toggle');
        }
    },

})
</script>
@endsection