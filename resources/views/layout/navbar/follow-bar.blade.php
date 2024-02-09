<div class="card-header pb-0 border-0">
    <h5 class="">Who to follow</h5>
</div>
<div class="card-body">
    @foreach ( $usersToFollow as $user)
    <div class="hstack gap-2 mb-3 mr-5">
        <div class="overflow-hidden">
            <a class="h6 mb-0" href="{{ route('users.show',$user->id) }}">&#64;{{ $user->name }}</a>
            <p class="mb-0 small text-truncate">&#64;{{ $user->name }}</p>
        </div>
                <form action="{{ route('user.follow', $user) }}" method="post">
                    @csrf
                    <button class="btn btn-primary-soft rounded-circle icon-md ms-auto" type="submit"> <i
                        class="fa-solid fa-plus"> </i> </button>
                </form>
    </div>
    @endforeach
    
    
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href="{{ route('users.others') }}">Show More</a>
    </div>
</div>
</div>