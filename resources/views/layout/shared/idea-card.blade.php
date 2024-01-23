    <div class="mt-3">
        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}" alt="{{ $idea->user->name }}">
                        <div>
                            <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                                </a></h5>
                        </div>
                    </div>
                    {{-- @if (auth()->check() && auth()->user()->id == optional($idea->user)->id)
                    <form method="POST" action={{ route('ideas.destroy',$idea->id) }}>
                        @csrf
                        @method('Delete')
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>
                    </form>
                    @endif --}}
                </div>
               
            </div>
        
            <div class="card-body">
                <a href={{ route('ideas.show',$idea->id) }} class="fw-light nav-link fs-6">
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
                </a>
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="#" class="fw-light nav-link fs-6"> <span class="fas text-danger fa-heart me-1">
                            </span> {{ $idea->likes }} </a>
                    </div>
                    <div>
                        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                            {{ $idea->updated_at }} </span>
                    </div>
                </div>
                @include('comment.comment')
            </div>
        </div>
    </div>
    