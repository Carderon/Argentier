<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>@yield( "title" )</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />

	<meta name="description" content="@yield("metadescription")">
	<meta name="robots" content="noindex, nofollow">

	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,300,400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ mix("css/styles.min.css") }}" />

	<script defer src="{{ asset("js/manifest.js") }}"></script>
	<script defer src="{{ asset("js/vendor.js") }}"></script>
	<script defer src="{{ mix("js/script.min.js") }}"></script>
</head>
