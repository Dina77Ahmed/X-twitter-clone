<div>
    @auth
    @if (Auth::user()->is_like($idea))
    <form action="{{ route('idea.dislike',$idea->id) }}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas text-danger fa-heart me-1">
        </span> {{ $idea->like()->count() }} </button>
    </form>
        @else
        <form action="{{ route('idea.like',$idea->id) }}" method="post">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="fas  fa-heart me-1">
            </span> {{ $idea->like()->count() }} </button>
        </form>
    @endif
    @else
    <div> 
        @if ($idea->like()->count())
                <a href="{{ route('login') }}" class="fw-light nav-link  fs-6"> <span class="fas text-danger fa-heart me-1">
            </span> {{ $idea->like()->count() }} </a>
            @else
            <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="fas  fa-heart me-1">
            </span> {{ $idea->like()->count() }} </a>
                @endif
        </div>
    @endauth

</div>