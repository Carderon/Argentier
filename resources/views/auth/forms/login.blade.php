<form class="users-form -auth flex -col -md" action="/login" method="post">
    @csrf
    <h3 class="_hide">Se connecter</h3>

    <div class="flex -col -child">
        <input class="input" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">

        @if($errors->count())
            <ul class="input-errors">
                @foreach ($errors->get("email") as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="flex -col -child">
        <input class="input" type="password" name="password" id="password" placeholder="Mot de passe">

        @if($errors->count())
            <ul class="input-errors">
                @foreach ($errors->get("password") as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <label class="flex -row -child -one -hcenter -spacebetween" for="remember">
        <input type="checkbox" name="remember" id="remember">
        <span class="col">Se souvenir de moi ?</span>
    </label>

    <div class="flex -col -child">
        <button type="submit" class="btn -primary">Connexion</button>
    </div>
</form>
