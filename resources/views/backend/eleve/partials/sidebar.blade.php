<div class="sidebar">
    <div class="sidebar__logo">
        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo site" class="img-fluid"/>
    </div>
    <ul class="sidebar__box-link">
        <li class="{{Route::currentRouteName()=='eleve-accueil' ? 'active' : ''}}">
            <a href="{{route('eleve-accueil')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/home.svg')}}" alt="home">
                    </span>
                    <span class="title">Tableau de bord</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='eleve-sujets' ? 'active' : ''}}">
            <a href="{{route('eleve-sujets')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/compo.svg')}}" alt="compo">
                    </span>
                    <span class="title">Sujets</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='eleve-compo' ? 'active' : ''}}">
            <a href="{{route('eleve-compo')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/demande.svg')}}" alt="compo">
                    </span>
                    <span class="title">Composition</span>
                </div>
            </a>
        </li>
        {{-- <li class="{{Route::currentRouteName()=='eleve-examen' ? 'active' : ''}}">
            <a href="{{route('eleve-examen')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/compo.svg')}}" alt="compo">
                    </span>
                    <span class="title">Examen</span>
                </div>
            </a>
        </li> --}}
        {{-- <li class="{{Route::currentRouteName()=='eleve-distinction' ? 'active' : ''}}">
            <a href="{{route('eleve-distinction')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/distinction.svg')}}" alt="distinction">
                    </span>
                    <span class="title">Distinction</span>
                </div>
            </a>
        </li> --}}
        <li class="{{Route::currentRouteName()=='eleve-compte-celpay' ? 'active' : ''}}">
            <a href="{{route('eleve-compte-celpay')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/account.svg')}}" alt="account">
                    </span>
                    <span class="title">Compte CELPAY</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='eleve-faire-demande' ? 'active' : ''}}">
            <a href="{{route('eleve-faire-demande')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/demande.svg')}}" alt="demande">
                    </span>
                    <span class="title">Faire une demande</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='eleve-celchat' ? 'active' : ''}}">
            <a href="{{route('eleve-celchat')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/chat.svg')}}" alt="tchat">
                    </span>
                    <span class="title">CELChat</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='eleve-document' ? 'active' : ''}}">
            <a href="{{route('eleve-document')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/documents.svg')}}" alt="documents">
                    </span>
                    <span class="title">Documents</span>
                </div>
            </a>
        </li>
    </ul>
</div>