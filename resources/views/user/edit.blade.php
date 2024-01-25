@section('title')
User | Edit
@endsection

@extends('layout.app')

@section('content')
<div class="col-6">
    <div class="card">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="Mario Avatar">
                        <div>
                            <h3 class="card-title mb-0">
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                @error('name')
                        <span class="fs-6 text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                            </h3>
                            <span class="fs-6 text-muted">
                                &#64;{{$user->name }}
                            </span>
                        </div>
                    </div>
                    <div>
                        {{-- @if ( auth()->user()->id == ($user->id))
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success btn-sm mt-2">
                            Edit
                        </a>
                        @endif --}}
                    </div>
                </div>
                <div class="px-2 mt-4">
                    <h5 class="fs-5"> Bio : </h5>
                    <div class="fs-6 fw-light">
                        <textarea class="form-control" id="idea" name="bio" rows="3">
                            {{ $user->bio }}
                        </textarea>
                        @error('bio')
                        <span class="fs-6 text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
    
                    {{-- <div class="d-flex justify-content-start">
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
                    </div> --}}
                   
                   {{-- @if (auth()->id() != $user->id)
                   <div class="mt-3">
                       <button class="btn btn-primary btn-sm"> Follow </button>
                   </div>
                   @endif --}}
                   
                   <button class="btn btn-success btn-sm" type="submit"> update </button>
    
                </div>
            </div>
        </form>
                
            
        
    </div>
    </div>
@endsection