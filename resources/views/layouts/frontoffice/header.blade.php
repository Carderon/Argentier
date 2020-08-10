<header class="header">
    <h1 class="_hide">L'argentier</h1>

    <div class="header-logo">
        <a href="{{ route("users.dashboard") }}">
            <img class="img" src="{{ asset("images/logo.png") }}"/>
        </a>
    </div>

    <nav class="header-nav nav">
        <div class="flex -row -spacearound -one -md">
            <a href="{{ route("users.categories") }}" class="link -child">Mes catégories</a>
            <a href="{{ route("entries.create") }}" class="link -child">Lire ticket caisse</a>
        </div>
        <div class="flex -row -alignright -one">
            <div class="nav-item">
                @include("auth.forms.logout")
            </div>
        </div>
    </nav>
</header>
