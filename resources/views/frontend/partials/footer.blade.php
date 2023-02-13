<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="footer-content">
                    <div class="logo">
                        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                    </div>
                    <p class="paragraph-site">
                        CEL (compo en ligne) est comme son nom l’indique une plateforme numérique 
                        qui propose des compositions,  évaluations et examens en ligne dans un système 
                        totalement novateur.
                    </p>
                    <div class="reseaux">
                        <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                        <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                        <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                        <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-content">
                    <div class="menu-footer">
                        <a href="{{route('accueil')}}">Accueil</a>
                        <a href="{{route('about')}}">A propos</a>
                        <a href="{{route('blogs')}}">Blogs</a>
                        <a href="{{route('composition')}}">Composer maintenant</a>
                    </div>
                    <div class="coord">
                        <div class="icone-fa"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <p class="paragraph-site">Côte d'Ivoire, Abidjan - Bingerville</p>
                    </div>
                    <div class="coord">
                        <div class="icone-fa"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <p class="paragraph-site">myincospace@gmail.com</p>
                    </div>
                    <div class="coord">
                        <div class="icone-fa"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <p class="paragraph-site">+225 0708117036 / 0142730930</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="copyright">
            <p class="paragraph-site">&copy; 2021 CompoEnLigne. All Rights Reserved.</p>
            <p class="paragraph-site">Develop by <span>inco plus</span>.</p>
        </div>
    </div>
</footer>