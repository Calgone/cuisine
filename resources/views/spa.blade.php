<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>La cuisine de Grégory</title>
</head>

<body class="main has-navbar-fixed-top">
    <div id="app">
        <app></app>
        <!-- <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens> -->
    </div>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Cuisine</strong> 2019, par
                <a href="https://gregorylecubin.com">Grégory Lecubin</a>.
            </p>
        </div>
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
    <style type="text/css">
        .main {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        div#app {
            flex: 1;
        }
    </style>
</body>

</html>