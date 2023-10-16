<html>
<head>
    <title>@yield('title', 'TT Coding Task 5')</title>
    <link rel="icon" type="image/png" href="https://toucantech.com/uploads/default/customization/FAVICON.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('stylesheets')
</head>
<body class="container">
    @include('includes.header')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    @yield('javascript')
</body>
</html>
