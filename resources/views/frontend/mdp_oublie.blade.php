<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/images/logo-cel.png')}}" type="image/x-icon">
    <title>CEL || Mot de passe oublié</title>

    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>

    <div class="sign-general">
        <div class="container">
            <div class="sign-general-content --login">
                <a href="{{route('accueil')}}">
                    <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                </a>
                <div class="box-form-sign">
                    <h2 class="title">Mot de passe oublié</h2>
                    <p class="paragraph-site">Vous avez déja un compte ? <a href="{{route('inscription')}}">Inscrivez-vous</a></p>
                    <form action="" class="form-row form-sign">
                        <div class="col-lg-12">
                            <div class="form--group">
                                <label for="user">E-mail ou Téléphone</label>
                                <input type="text" id="user" name="user" placeholder="Identifiant ou E-mail ou Téléphone" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-standard --red">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>