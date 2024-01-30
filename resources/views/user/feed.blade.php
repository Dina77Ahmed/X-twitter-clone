@section('title')
Home
@endsection
@extends('layout.app')
@section('content')
<div class="col-6">
    @if($ideasWithComments->isEmpty())
    <h1 class="text-center">No Results</h1>
    @else
@foreach ($ideasWithComments as $idea)
@include('idea.idea-card')
@endforeach
@endif
</div>
@endsection 