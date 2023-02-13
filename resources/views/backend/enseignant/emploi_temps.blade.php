@extends('backend/enseignant/layout/default', ['title' => "CEL || Emploi du temps"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-emploisDuTemps">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Emploi du temps</span></li>
                    </ul>
                    <h3 class="title">Emploi du temps</h3>
                </div>
                <div class="availability">
                    <h3 class="title-availability">Disponibilité Interrogation orale</h3>
                    <div class="row mt-5 row-reverse">
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="infor-dispo">
                                <h3 class="title-infor">Liste des jours de disponibilité</h3>
                                <div class="list-infor response-table-2">
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th scope="col">Jours</th>
                                                <th scope="col">Heure de début</th>
                                                <th scope="col">Heure de fin</th>
                                                <th scope="col">Dates</th>
                                                <th scope="col">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>mardi</td>
                                                <td>15h30</td>
                                                <td>18h00</td>
                                                <td>15 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>jeudi</td>
                                                <td>22h</td>
                                                <td>23h30</td>
                                                <td>17 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>samedi</td>
                                                <td>10h</td>
                                                <td>12h</td>
                                                <td>19 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-5">
                            <form action="" class="form-row form-demande form-dispo">
                                <div class="col-12">
                                    <h3 class="title-form">
                                        Veuillez renseigner le formulaire de disponibilité
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="days">Jour</label>
                                        <input type="text" name="days" id="days" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="hour1">Heure de début</label>
                                        <input type="text" name="hour1" id="hour1" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="hour2">Heure de fin</label>
                                        <input type="text" name="hour2" id="hour2" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-standard-2">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="availability">
                    <h3 class="title-availability">Disponibilité Explication de cours en ligne</h3>
                    <div class="row mt-5 row-reverse">
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="infor-dispo">
                                <h3 class="title-infor">Liste des jours de disponibilité</h3>
                                <div class="list-infor response-table-2">
                                    <table class="table table-striped" id="table2">
                                        <thead>
                                            <tr>
                                                <th scope="col">Jours</th>
                                                <th scope="col">Heure de début</th>
                                                <th scope="col">Heure de fin</th>
                                                <th scope="col">Dates</th>
                                                <th scope="col">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>mardi</td>
                                                <td>15h30</td>
                                                <td>18h00</td>
                                                <td>15 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>jeudi</td>
                                                <td>22h</td>
                                                <td>23h30</td>
                                                <td>17 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>samedi</td>
                                                <td>10h</td>
                                                <td>12h</td>
                                                <td>19 juin 2021</td>
                                                <td class="action">
                                                    <a href="#" class="icon --update">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" class="icon --delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-5">
                            <form action="" class="form-row form-demande form-dispo">
                                <div class="col-12">
                                    <h3 class="title-form">
                                        Veuillez renseigner le formulaire de disponibilité
                                    </h3>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="days">Jour</label>
                                        <input type="text" name="days" id="days" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="hour1">Heure de début</label>
                                        <input type="text" name="hour1" id="hour1" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="hour2">Heure de fin</label>
                                        <input type="text" name="hour2" id="hour2" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-standard-2">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/datatable/datatable.advanced.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.basic.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.init.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
            $('#table2').DataTable();
        } );
    </script>
@endsection