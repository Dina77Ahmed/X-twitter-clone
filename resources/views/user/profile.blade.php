@section('title')
    Profile
@endsection

@extends('layout.app')
@section('content')
    <div class="col-6">
        @include('layout.shared.success-message')
        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    {{--  --}}
                    <div class="d-flex align-items-center">
                        <img class="me-3 avatar-sm rounded-circle" style="width:150px;height:150px"
                            src="{{ asset('storage/profile/' . $user->image) }}" alt="{{ $user->name }}">
                        <div>
                            <h3 class="card-title mb-0">
                                <a href="#">
                                    {{ $user->name }}
                                </a>
                            </h3>
                            <span class="fs-6 text-muted">
                                &#64;{{ $user->name }}
                            </span>
                        </div>
                    </div>
                    <div>
                        @if (auth()->user()->id == $user->id)
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm mt-2 ">
                                Edit
                            </a>
                        @endif
                    </div>
                </div>
                <div class="px-2 mt-4">
                    @if ($user->bio)
                        <h5 class="fs-5"> Bio : </h5>
                        <p class="fs-6 fw-light">{{ $user->bio }}</p>
                    @endif
                    <div class="d-flex justify-content-start">
                        <a href="#" class="fw-light nav-link fs-6 me-3">
                            <span class="fas fa-user me-1">
                            </span> {{ $user->followers()->count() }} </a>
                        <a href="#" class="fw-light nav-link fs-6 me-3">
                            <span class="fas fa-brain me-1"></span>
                            {{ $user->ideas()->count() }}
                        </a>
                        <a href="#" class="fw-light nav-link fs-6">
                            <span class="fas fa-comment me-1"></span>
                            {{ $user->comments()->count() }}
                        </a>
                    </div>

                    @if (auth()->id() != $user->id)
                        <div class="mt-3">
                            @if (Auth::user()->is_follow($user))
                                <form action="{{ route('user.unfollow', $user) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit"> UnFollow </button>
                                </form>
                            @else
                                <form action="{{ route('user.follow', $user) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-sm" type="submit"> Follow </button>
                                </form>
                            @endif
                        </div>
                    @endif


                </div>
            </div>
        </div>
        <h4 class="mt-4"> Share yours ideas </h4>
        @include('layout.shared.submit-form')
        <hr>
        @forelse ($userIdeas as $idea)
            @include('idea.idea-card')
        @empty
            <h5 class="text-center mt-5">Add New Idea 😊💫</h5>
        @endforelse
        <div class=" mt-3 ">
            {{ $userIdeas->links() }}
        </div>
    </div>
@endsection
{{-- {{ dd($userIdeas) }} --}}
