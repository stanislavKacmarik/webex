<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="'public/'.{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.22.1/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyADOX1RMhE4_DHuns2KVg_PsYSo8vTOBnc",
            authDomain: "postoj-test.firebaseapp.com",
            databaseURL: "https://postoj-test.firebaseio.com",
            projectId: "postoj-test",
            storageBucket: "postoj-test.appspot.com",
            messagingSenderId: "163855958416",
            appId: "1:163855958416:web:61500d6211900f24f6f315"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
        <div id="app">
            <app-component></app-component>
        </div>

    </body>

    <!-- Scripts -->
    <script src="'public/'.{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

</html>
