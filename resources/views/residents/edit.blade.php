<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>Edit Resident</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body class="bg-teal-lightest">

        <div id="app" data-app>
            <edit-resident :states="{{ json_encode(config('states')) }}" :resident-before="{{ json_encode($resident) }}"></edit-resident>
        </div>

    </body>
</html>


<script src="{{ mix('/js/app.js') }}"></script>