<div class="overlay">&nbsp;</div>
<nav class="navigation">
    <div class="container">
        <div class="navigation-content">
            <a href="{{route('accueil')}}">
                <div class="logo">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
            </a>
            <div class="menu">
                <ul class="list">
                    <li class="list-item"><a href="{{route('accueil')}}" class="list-item--link underline-animate">Accueil</a></li>
                    <li class="list-item"><a href="{{route('about')}}" class="list-item--link underline-animate">A propos</a></li>
                    <li class="list-item"><a href="{{route('blogs')}}" class="list-item--link underline-animate">Blogs</a></li>
                    <li class="list-item"><a href="{{route('contact')}}" class="list-item--link underline-animate">Contact</a></li>
                </ul>
                <div class="box-btn">
                    <a href="{{route('inscription')}}"><button class="btn-standard --blue">S'inscrire</button></a>
                    <a href="{{route('connexion')}}"><button class="btn-standard --red">Composer</button></a>
                </div>
                {{-- <div class="box-user">
                    <span class="name">Elidje Hoba Nick Jefferson</span>
                    <div class="user">
                        <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                    </div>
                    <div class="user-link">
                        <a href="#" class="link"><i class="fa fa-globe" aria-hidden="true"></i>Mon espace</a>
                        <a href="profil.html" class="link"><i class="fa fa-user" aria-hidden="true"></i>Profil</a>
                        <hr class="underline" />
                        <a href="#" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i>Déconnexion</a>
                    </div>
                </div> --}}
            </div>
            <div class="icone-open">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</nav>