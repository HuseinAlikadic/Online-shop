@extends('layouts.app')

@section('content')

<div class="container">
    <div>

        <div class="row">
            <div class="col-md-6">
                <p>Podaci o stanju uredzaja:</p>
            </div>
            <div class="col-md-6">
                <a href="/admin"> <button type="button" class="btn btn-light float-right ml-5">Back</button></a>
                <button type="button" class="btn btn-secondary float-right" data-target="#dodajNovoStanje"
                    @click="dodajStanje()">Dodaj
                    stanje</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rbr.</th>
                    <th>Stanje</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item,index in stanjeUredzaja">
                    <td>@{{index +1}}</td>
                    <td>@{{item.stanje}}</td>
                    <td><i class="fas fa-edit" @click="editStanje(index)"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
            </tbody>
        </table>

        <!-- Modal za edit stanja uredzaja -->
        <!-- The Modal -->
        <div class="modal" id="editStanjeUredzaja">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="/editStanjeUredzaja" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" :value="stanjeArray.id" name="id">
                            <div class="form-group">
                                <label for="sel1">Select list:</label>
                                <input type="text" class="form-control" v-model="stanjeArray.stanje" name="stanje">
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
        <!-- Modal za dodavanje novog stanja uredzaja -->
        <div class="modal" id="dodajNovoStanje">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <form action="/addStanjeUredzaja" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" :value="stanjeUredzaja.id" name="id">
                            <div class="form-group">
                                <label for="usr">Stanje:</label>
                                <input type="text" class="form-control" v-model="stanjeUredzaja.stanje" name="stanje">
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
        name: 'admin-stanje',
        data() {
            return {
                stanjeUredzaja: <?=$stanjeUredzaja ?>,
                stanjeArray: [],

            }
        },
        methods: {
            editStanje: function(index) {
                this.stanjeArray = this.stanjeUredzaja[index];
                $('#editStanjeUredzaja').modal('toggle');
            },
            dodajStanje: function() {
                $('#dodajNovoStanje').modal('toggle');
            }
        },

    })
    </script>
    @endsection