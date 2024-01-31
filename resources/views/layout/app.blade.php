@include('layout.shared.head')
<body>
    @include('layout.navbar.navbar')
    <div class="container py-4 ">
        <div class="row mt-5">
            <div class="col-3">
                @include('layout.navbar.left-sidebar')
            </div>
            @yield('content')
                @include('layout.navbar.rigth-sidebar')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
