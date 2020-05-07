<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Budget</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
@auth()
    <div id="app" class="app">
        <App></App>
    </div>
@else
    @yield('content')
@endauth
<!-- /#wrapper -->
</body>
<script>
    function open_menu() {
        let menu_all = document.getElementById('wrapper');
        menu_all.classList.toggle("toggled");
    }
</script>
</html>

