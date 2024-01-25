@section('title')
Home
@endsection
@extends('layout.app')
@section('content')
<div class="col-6">
    @if($ideasWithComments->isEmpty())
    <h1 class="text-center">No Results</h1>
    @else
    @include('layout.shared.success-message')
    @include('layout.shared.waring-message')
    @auth
    <h4> Share yours ideas </h4>
    @include('layout.shared.submit-form')
    <hr>
    @endauth

    {{-- @forelse($ideasWithComments as $idea)
    @include('idea.idea-card')
    @empty
    <div>Nothing to show</div>
    @endforelse --}}
    @foreach ($ideasWithComments as $idea)
    @include('idea.idea-card')
    @endforeach
    
    <div class=" mt-3 " >
        {{ $ideasWithComments->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection 