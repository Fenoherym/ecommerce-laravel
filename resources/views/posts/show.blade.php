@extends('app')

@section('content')
    <div class="container">
         <h5>{{ $post->title }}</h5>
         <img src="{{ $post->photoUrl }}" alt="">
         <p>{!! $post->content !!}</p>
    </div>
@endsection
