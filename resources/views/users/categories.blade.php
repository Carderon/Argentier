@extends("layouts.frontoffice.template")

@section("body-template-class", "-frontoffice")

@section("content")
    <main class="main">
        <h1 class="">Mes catégories</h1>

        <section class="flex -col -md">
            <ul class="flex -col -md -child">
                @foreach($categories as $category)
                    <li class="flex -row -child -vcenter">
                        <p class="-child">{{ $category->name }}</p>
                        <a href="#" class="btn -primary -child">Editer</a>
                    </li>
                @endforeach
            </ul>

            <div class="-child">
                @include("categories.forms.create")
            </div>
        </section>
    </main>
@endsection
