@if (session('waring'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{  session('waring') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif




