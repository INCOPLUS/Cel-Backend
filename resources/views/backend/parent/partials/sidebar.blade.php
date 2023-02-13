<div class="sidebar">
    <div class="sidebar__logo">
        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo site" class="img-fluid" />
    </div>
    <ul class="sidebar__box-link">
        <li class="{{Route::currentRouteName()=='parent-accueil' ? 'active' : ''}}">
            <a href="{{route('parent-accueil')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/home.svg')}}" alt="home">
                    </span>
                    <span class="title">Tableau de bord</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='parent-liste-enfant' ? 'active' : ''}}">
            <a href="{{route('parent-liste-enfant')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/children.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Liste des enfants</span>
                </div>
            </a>
        </li>
        {{-- <li class="{{Route::currentRouteName()=='parent-composition' ? 'active' : ''}}">
            <a href="{{route('parent-composition')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/compo.svg')}}" alt="compo">
                    </span>
                    <span class="title">Composition</span>
                </div>
            </a>
        </li> --}}
        {{-- <li class="{{Route::currentRouteName()=='parent-gestion-compte' ? 'active' : ''}}">
            <a href="{{route('parent-gestion-compte')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestion des comptes</span>
                </div>
            </a>
        </li> --}}
        <li class="{{Route::currentRouteName()=='parent-compte-celpay' ? 'active' : ''}}">
            <a href="{{route('parent-compte-celpay')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/account.svg')}}" alt="account">
                    </span>
                    <span class="title">Compte CELPAY</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='parent-faire-demande' ? 'active' : ''}}">
            <a href="{{route('parent-faire-demande')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/demande.svg')}}" alt="demande">
                    </span>
                    <span class="title">Faire une demande</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='parent-celchat' ? 'active' : ''}}">
            <a href="{{route('parent-celchat')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/chat.svg')}}" alt="tchat">
                    </span>
                    <span class="title">CELChat</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='parent-document' ? 'active' : ''}}">
            <a href="{{route('parent-document')}}">
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