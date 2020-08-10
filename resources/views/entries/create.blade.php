@extends("layouts.frontoffice.template")

@section("body-template-class", "-frontoffice")
@section("title", "Comptable - Édition")

@section("content")
    <main class="main flex -col -md">
        <h1>Créer</h1>

        <div class="app-vue">
            <div class="pending-container">
                <div class="pending">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <entries-create />
        </div>
    </main>
@endsection
