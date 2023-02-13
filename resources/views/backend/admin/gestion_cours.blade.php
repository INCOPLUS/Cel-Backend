@extends('backend/admin/layout/default', ['title' => "CEL || Gestion des cours"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-gestion-general">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Gestion des cours</span></li>
                    </ul>
                    <h3 class="title">Gestion des cours</h3>
                    <div class="box-gestion-co">
                        <h3 class="title-oral">Liste des cours explicatifs</h3>
                        <div class="response-table">
                            <table class="table table-striped table-gestion" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom &amp; prénom(s)</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Matière</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Elidje grâce emmanuella</td>
                                        <td>élève</td>
                                        <td>Troisième</td>
                                        <td>01 01 01 01 01</td>
                                        <td>Anglais</td>
                                        <td>18 juin 2021</td>
                                        <td>09:20</td>
                                    </tr>
                                    <tr>
                                        <td>Prao ange christelle</td>
                                        <td>élève</td>
                                        <td>Terminale</td>
                                        <td>07 07 07 07 07</td>
                                        <td>Espagnol</td>
                                        <td>19 juin 2021</td>
                                        <td>09:20</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
    
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/datatable/datatable.advanced.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.basic.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.init.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        } );
    </script>
@endsection