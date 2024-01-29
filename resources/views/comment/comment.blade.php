<div>
    <form action="{{ route('ideas.comments.store',$idea) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name='my_comment' class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-secondary btn-sm"> Post Comment </button>
    </form>
    </div>

    @foreach ($idea->comments as $comment)
    <hr>
    <div class="d-flex align-items-start">
        <img  style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ asset('storage/profile/' . $comment->user->image) }}" 
            alt="{{ $comment->user->name }}">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">{{ $comment->user->name }}
                </h6>
                 
            </div>
            
            <p class="fs-6 mt-3 fw-light">
                {{ $comment->my_comment }}
            </p>
            <div class="d-flex justify-content-between">
                <a href="#" class="fw-light nav-link fs-6">
                     <span class="fas fa-heart me-1 text-danger ">
                </span> {{ $comment->comment_likes }} </a>
            <small class="fs-6 fw-light text-muted mb-3 "> {{ $comment->updated_at }}</small>
            </div>
        </div>
        
    </div>
    @endforeach
</div>


