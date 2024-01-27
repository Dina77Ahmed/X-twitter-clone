@section('title')
Profile
@endsection

@extends('layout.app')

@section('content')
<div class="col-6">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px;height:150px" class="me-3 avatar-sm rounded-circle"
                            src="{{ asset('storage/profile/' . $user->image) }}" alt="{{ $user->name }}">
                    <div>
                        <h3 class="card-title mb-0">
                            <a href="#">
                            {{ $user->name }}
                            </a>
                        </h3>
                    <span class="fs-6 text-muted">
                        &#64;{{$user->name }}
                    </span>
                    </div>
                </div>
                <div>
                    @if ( auth()->user()->id == ($user->id))
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm mt-2 rounded-circle">
                        Edit
                    </a>
                    @endif
                </div>
            </div>
            <div class="px-2 mt-4">
                @if($user->bio)
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">{{ $user->bio }}</p>
                @endif
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3">
                         <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
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
                   <button class="btn btn-primary btn-sm"> Follow </button>
               </div>
               @endif
               
               
            </div>
        </div>
    </div>
    @foreach ($userIdeas as $idea)

    @include('idea.idea-card')
@endforeach
<div class=" mt-3 " >
    {{ $userIdeas->links() }}
</div>
</div>
@endsection
{{-- {{ dd($userIdeas) }} --}}
