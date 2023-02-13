<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo-cel.png')}}" type="image/x-icon">
    <title>CEL || Inscription</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

</head>
<body>

    <div class="sign-general">
        <div class="container">
            <div class="sign-general-content">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="sign-with --register">
                            <a href="{{route('accueil')}}">
                                <div class="logo">
                                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                                </div>
                            </a>
                            <h2 class="title">S'inscrire en tant que :</h2>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">Elève / Etudiant</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">Enseignant / Professeur</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">Parent d'éléve</a>
                                </li>
                            </ul>

                            {{-- <div class="list-add-student-sign">
                                <div class="student">
                                    <p class="paragraph-site">S'inscrire via Facebook</p>
                                    <div class="icon-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                </div>
                                <div class="student">
                                    <p class="paragraph-site">S'inscrire via Google</p>
                                    <div class="icon-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="box-form-sign --register">
                            <h2 class="title">Inscrivez-vous</h2>
                            <p class="paragraph-site">Vous avez déja un compte ? <a href="{{route('connexion')}}">Connectez-vous</a></p>
                            <div class="tab-content" id="pills-tabContent">
                                {{-- Inscription Elève/Etudiant --}}
                                <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                                    <form class="form-row form-sign" id="form_eleve" action="{{ route('inscription-eleve') }}" method="POST">
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Nom & Prénom(s) <span class="text-danger">*</span></label>
                                                <input type="text" id="nom_eleve" class="form--group__input" placeholder="Nom & Prénom(s)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Contact (WhatsApp) <span class="text-danger">*</span></label>
                                                <input type="text" id="contact_eleve" class="form--group__input" placeholder="Contact (WhatsApp)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Adresse E-mail</label>
                                                <input type="email" id="email_eleve" class="form--group__input" placeholder="Adresse E-mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Genre</label>
                                                <select class="custom-select form--group__select" id="genre_eleve">
                                                    <option value="0">Choisir ...</option>
                                                    <option value="1">Masculin</option>
                                                    <option value="2">Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Enseignement</label>
                                                <select class="custom-select form--group__select" id="enseignement_eleve" onchange="afficherNiveau()">
                                                    <option value="0">Choisir ...</option>
                                                    @foreach ($enseignements as $enseignement)
                                                    <option value="{{ $enseignement->id_enseignement }}">{{ $enseignement->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Niveau (Classe)</label>
                                                <select class="custom-select form--group__select" id="niveau_eleve">
                                                    <option value="0">Choisir ...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_eleve" class="form--group__input" placeholder="Mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label for="confirmPassword">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_eleve_confirm" class="form--group__input" placeholder="Confirmer le mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" id="btn_inscription_eleve" class="btn-standard --red">S'inscrire</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Inscription Enseignant --}}
                                <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                                    <form class="form-row form-sign" id="form_enseignant" action="{{ route('inscription-enseignant') }}" method="POST">
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Nom & Prénom(s) <span class="text-danger">*</span></label>
                                                <input type="text" id="nom_enseignant" class="form--group__input" placeholder="Nom & Prénom(s)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Contact (WhatsApp) <span class="text-danger">*</span></label>
                                                <input type="text" id="contact_enseignant" class="form--group__input" placeholder="Contact (WhatsApp)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Adresse E-mail</label>
                                                <input type="email" id="email_enseignant" class="form--group__input" placeholder="Adresse E-mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Genre</label>
                                                <select class="custom-select form--group__select" id="genre_enseignant">
                                                    <option value="0">Choisir ...</option>
                                                    <option value="1">Masculin</option>
                                                    <option value="2">Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Enseignement</label>
                                                <select class="custom-select form--group__select" id="enseignement_enseignant" onchange="afficherMatieres()">
                                                    <option value="0">Choisir ...</option>
                                                    @foreach ($enseignements as $enseignemen)
                                                    <option value="{{ $enseignemen->id_enseignement }}">{{ $enseignemen->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Discipline enseignée</label>
                                                <select class="custom-select form--group__select" id="discipline_enseignant">
                                                    <option value="0">Choisir ...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_enseignant" class="form--group__input" placeholder="Mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label for="confirmPassword">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_enseignant_confirm" class="form--group__input" placeholder="Confirmer le mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" id="btn_inscription_enseignant" class="btn-standard --red">S'inscrire</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Inscription Parent --}}
                                <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                                    <form class="form-row form-sign" id="form_parent" action="{{ route('inscription-parent') }}" method="POST">
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Nom & Prénom(s) <span class="text-danger">*</span></label>
                                                <input type="text" id="nom_parent" class="form--group__input" placeholder="Nom & Prénom(s)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Contact (WhatsApp) <span class="text-danger">*</span></label>
                                                <input type="text" id="contact_parent" class="form--group__input" placeholder="Contact (WhatsApp)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Adresse E-mail</label>
                                                <input type="email" id="email_parent" class="form--group__input" placeholder="Adresse E-mail">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Genre</label>
                                                <select class="custom-select form--group__select" id="genre_parent">
                                                    <option value="0">Choisir ...</option>
                                                    <option value="1">Masculin</option>
                                                    <option value="2">Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Profession</label>
                                                <input type="text" id="profession_parent" class="form--group__input" placeholder="Profession">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Nombre d'enfants à inscrire</label>
                                                <input type="number" min="1" id="nbre_enfant_parent" class="form--group__input" placeholder="Nombre d'enfants">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label>Mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_parent" class="form--group__input" placeholder="Mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form--group">
                                                <label for="confirmPassword">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                                <input type="password" id="mdp_parent_confirm" class="form--group__input" placeholder="Confirmer le mot de passe" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" id="btn_inscription_parent" class="btn-standard --red">S'inscrire</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/frontend.js')}}"></script>

</body>
</html>