<div class="col-3">
    @include('layout.navbar.search-bar')
    @auth
    <div class="card mt-3">
    @include('layout.navbar.follow-bar')
    </div>
    @endauth
</div>