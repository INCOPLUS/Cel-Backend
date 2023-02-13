<!DOCTYPE html>
<html lang="fr">
<head>
    {{-- Inclusion des mata données --}}
    @include('frontend/partials/meta-data')

    {{-- Inclusion des CSS du template --}}
    @include('frontend/partials/css-files')

    {{-- Définition de CSS personnalisés --}}
    @yield('css-personnel')
</head>
<body>
    {{-- Preloader --}}
    @yield('preloader')

    {{-- Banner Top --}}
    @include('frontend/partials/banner-top')

    {{-- Navigation --}}
    @include('frontend/partials/navigation')

    {{-- Header --}}
    @yield('header')

    {{-- Main --}}
    @yield('main')

    {{-- Button Top --}}
    @include('frontend/partials/button-top')

    {{-- Footer --}}
    @include('frontend/partials/footer')

    {{-- Script --}}
    @include('frontend/partials/script')

    {{-- Script personnel --}}
    @yield('script-personnel')
    
</body>
</html>