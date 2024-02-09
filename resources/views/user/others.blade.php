{{-- otherFollowers --}}
@section('title')
    Discover
@endsection

@extends('layout.app')
@section('content')
<div class="col-6">
        @foreach ($otherFollowers as $user)
        <div class="card mb-3">
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
                        <form action="{{ route('user.follow', $user) }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit"> Follow </button>
                        </form>
                    </div>
                    
                </div>
        </div>
        @endforeach
    </div>
@endsection
