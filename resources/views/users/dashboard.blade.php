@extends("layouts.frontoffice.template")

@section("body-template-class", "-frontoffice")
@section("title", "Dashboard")

@section("content")
    <main class="main flex -col -md">
        <h1>Dashboard</h1>

        <div class="flex -row -spacebetween -child">
            <a href="{{ route("users.dashboard", $date->sub("month", 1)->format("m-Y")) }}" class="link">{{ ucfirst($date->sub("month", 1)->monthName) }}</a>

            @if($date->startOf("month") < Carbon\Carbon::now()->startOf("month"))
                <a href="{{ route("users.dashboard", $date->add("month", 1)->format("m-Y")) }}" class="link">{{ ucfirst($date->add("month", 1)->monthName) }}</a>
            @else
                <span></span>
            @endif
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

            <entries-manager
                :auth_user="{{ json_encode($user) }}"
                :token="{{json_encode(csrf_token())}}"
                :base_url="{{ json_encode(url("/")) }}"
                :account="{{ json_encode($account) }}"
                :grouped_entries="{{ json_encode($groupedEntries) }}"
                :categories="{{ json_encode($categories)}}"
                :date="{{ json_encode($date->format("m/Y")) }}"
            />
        </div>
    </main>
@endsection
