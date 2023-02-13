<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo-cel.png')}}" type="image/x-icon">
    <title>CEL || Connexion</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

</head>
<body>

    <div class="sign-general">
        <div class="container">
            <div class="sign-general-content --login">
                <a href="{{route('accueil')}}">
                    <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                </a>
                <div class="box-form-sign">
                    <h2 class="title">Connectez-vous</h2>
                    <p class="paragraph-site">Pas de compte ? <a href="{{route('inscription')}}">Inscrivez-vous</a></p>
                    <form class="form-row form-sign" id="form_connexion" action="{{ route('connexion-utilisateur') }}" method="POST">
                        <div class="col-lg-12">
                            <div class="form--group">
                                <label>Identifiant <span class="text-danger">*</span></label>
                                <input type="text" id="identifiant" class="form--group__input" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form--group">
                                <label>Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" id="mdp" class="form--group__input" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form--group text-right">
                                <a href="{{route('mdp-oublie')}}" class="password-forgot">Mot de passe oublié ?</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" id="btn_connexion" class="btn-standard --red">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/frontend.js')}}"></script>
</body>
</html>