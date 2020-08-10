@extends("layouts.frontoffice.template")

@section("body-template-class", "-fullscreen")

@section("content")
    <section class="flex -row -one -vcenter -hcenter">
        @include('auth.forms.login')
    </section>
@endsection
