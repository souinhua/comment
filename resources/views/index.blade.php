<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Comment App</title>

        <link type="text/css" rel="stylesheet" href="{{ asset("css/app.css") }}">
    </head>
    <body>
        <main id="app">
            <comment-app />
        </main>

        <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
    </body>
</html>
