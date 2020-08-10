@extends("layouts.frontoffice.template")

@section("body-template-class", "-fullscreen")

@section("content")
    <main class="flex -row -vcenter -hcenter">
        <a href="{{ route("users.dashboard")}}">
            <img class="img" src="{{ asset("images/logo.png") }}"/>
        </a>
    </main>
@endsection
