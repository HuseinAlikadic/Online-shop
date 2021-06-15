@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <div class="row">
            <div class="col-md-6">
                <p class="bojaNova">Podaci o kategorijama uredzaja:</p>
            </div>
            <div class="col-md-6 ">
                <a href="/admin"> <button type="button" class="btn btn-light float-right ml-5">Back</button></a>
                <button type="button" class="btn btn-secondary float-right" data-target="#dodajNovuKategoriju"
                    @click="dodajKategoriju()">Dodaj
                    kategoriju</button>
            </div>
        </div>


        @if (session('upozorenje'))
        <div class="alert alert-warning" role="alert">
            {{ session('upozorenje') }}
        </div>
        @elseif (session('uspijesno'))
        <div class="alert alert-success" role="alert">
            {{ session('uspijesno') }}
        </div>
        @elseif (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif (session('danger'))
        <div class="alert alert-warning" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rbr.</th>
                    <th>Kategorija</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="item,index in kategorijaArray">
                    <td>@{{index +1}}</td>
                    <td>@{{item.kategorija}}</td>
                    <td><i class="fas fa-edit" data-target="#editKategorije" @click="editujKategorije(index)"></i></td>
                    <td><i class="fas fa-trash-alt" data-target="#obrisiKategoriju"
                            @click="obrisiKategoriju(index)"></i></td>

                </tr>
            </tbody>
        </table>


        <!-- Modal za editovanje kategorija -->
        <div class="modal" id="editKategorije">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="/editKategorijaUredzaja" method="POST">
                        @csrf
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" v-model="kategorije.id" name="id">
                            <div class="form-group">
                                <label for="usr">Kategorija:</label>
                                <input type="text" class="form-control" v-model="kategorije.kategorija"
                                    name="kategorija">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submitt" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal za dodavanje novih vrijednosti -->
        <div class="modal" id="dodajNovuKategoriju">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="/addKategorijaUredzaja" method="POST">
                        @csrf
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" :value="kategorijaArray.id" name="id">
                            <div class="form-group">
                                <label for="usr">Kategorija:</label>
                                <input type="text" class="form-control" v-model="kategorijaArray.kategorija"
                                    name="kategorija">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submitt" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal za brisanje kategorije -->
        <div class="modal" id="obrisiKategoriju">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="/obrisiKategoriju" method="POST">
                        @csrf
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" :value="kategorije.id" name="id">
                            <p>Da li ste sigurni da zelite da izbrišete <b>@{{kategorije.kategorija}}</b> ? </p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submitt" class="btn btn-success">Izbrisi</button>
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
        name: 'admin-kategorija',
        data() {
            return {

                kategorijaArray: <?=$kategorija ?>,
                kategorije: []
            }
        },
        methods: {
            editujKategorije: function(index) {
                $('#editKategorije').modal('toggle');
                this.kategorije = this.kategorijaArray[index];
            },
            dodajKategoriju: function() {
                $('#dodajNovuKategoriju').modal('toggle');

            },
            obrisiKategoriju: function(index) {
                this.kategorije = this.kategorijaArray[index];
                $('#obrisiKategoriju').modal('toggle');
            }
        },

    })
    </script>
    @endsection