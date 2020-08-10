<body class="grid @yield("body-template-class")">
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @if(!Request::is("login") && !Request::is("/"))
        @include("layouts.frontoffice.header")
    @endif

    @yield("content")

    @if(!Request::is("login") && !Request::is("/"))
        @include('layouts.footer')
    @endif
</body>
