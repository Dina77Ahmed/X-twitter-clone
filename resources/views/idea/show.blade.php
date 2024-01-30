@section('title')
    Show
@endsection
@extends('layout.app')
@section('content')
    <div class="col-6">
        <div class="mt-3">
            @include('layout.shared.success-message')
            <div class="card">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img class="me-3 avatar-sm rounded-circle" style="width:150px;height:150px"
                                src="{{ asset('storage/profile/' . $idea->user->image) }}" alt="{{ $idea->user->name }}">
                            <div>
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('users.show', $idea->user_id) }}"> {{ $idea->user->name }}</a>
                                </h5>
                            </div>
                        </div>
                        <div>
                            @if (auth()->check() && auth()->user()->id == optional($idea->user)->id)
                                <form method="POST" action={{ route('ideas.destroy', $idea->id) }}>
                                    @csrf
                                    @method('Delete')
                                    <button class="btn btn-danger btn-sm">
                                        X
                                    </button>
                                </form>
                                <a href={{ route('ideas.edit', $idea->id) }} class="btn btn-primary btn-sm mt-2">
                                    Edit
                                </a>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart text-danger me-1">
                                </span> {{ $idea->likes }} </a>
                        </div>
                        <div>
                            <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                {{ $idea->updated_at->diffForHumans() }} </span>
                        </div>
                    </div>
                    <div>
                        @if($idea->comments->isEmpty())
                        <hr>
                        <div class="d-flex align-items-start">No comments</div>
                        @else
                        @include('comment.comment')
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
