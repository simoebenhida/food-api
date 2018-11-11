<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            <example-sleep />
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
