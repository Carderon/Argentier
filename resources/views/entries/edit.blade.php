@extends("layouts.frontoffice.template")

@section("body-template-class", "-frontoffice")
@section("title", "Comptable - Édition")

@section("content")
    <main class="main flex -col -md">
        <div class="flex -row -md -spacebetween">
            <h1 class="-child">Modifier</h1>
            @include("entries.forms.delete")
        </div>

        <div class="app-vue">
            <div class="pending-container">
                <div class="pending">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <entries-edit
                :auth_user="{{ json_encode($user) }}"
                :token="{{json_encode(csrf_token())}}"
                :base_url="{{ json_encode(url("/")) }}"
                :entry="{{ json_encode($entry)}}"
                :categories="{{ json_encode($categories)}}"
            />
        </div>
    </main>
@endsection
