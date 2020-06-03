<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$settings->sitename}} | @yield('pageTitle')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('backend/sass/main.min.css') }}">


    <!-- multiple select CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}" >
</head>
<body>
    @include('backend.components.header')
    <main class="main d-flex">
        @include('backend.components.nav')

        <div class="content">
            <div class="content__title">
              <div class="content__title--wrap d-flex align-items-center justify-content-between">
                <h2>@yield('pageTitle')</h2>
                @yield('addButton')
              </div>
                @yield('tabs')
            </div>
            <div class="container-fluid">
              <div class="content__body">
                @yield('content')
              </div>
            </div>
            <footer class="footer">
              <p>Copyright &copy;{{ now()->year }}. Mind Seed Studios.</p>
            </footer>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=t3zj842wq4c2yt08l6aspi9m7kg0opub6466aac0bx9jfxyg"></script>
    <script>
        tinymce.init({
            selector:'.editor',
            height: 300,
            plugins: 'lists, link, code, image, table',
            toolbar:'formatselect | bold, italic, underline | image | link, unlink | ' +
                'bullist, numlist | table | removeformat | code',
            branding: false,
            menubar: false
        });

        tinymce.init({
            selector:'.address',
            height: 100,
            toolbar:'bold, italic, underline |',
            branding: false,
            menubar: false
        });

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @yield('js')
</body>
</html>
