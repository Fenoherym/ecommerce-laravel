@extends('app')


@section('content')
<div class="container">

    @foreach ($posts as $post)
    <div class="card">
        <div class="card__header">
          <img src="{{ $post->photoUrl }}" alt="card__image" class="card__image" width="600">
        </div>
        <div class="card__body">
          <span class="tag tag-blue">{{ $post->category->name }}</span>
          <h4>{{ $post->title }}</h4>
          <p>{!!  getExcerpt( $post->content, 255) !!}}  <a href="{{ route('post.show', $post->id) }}">Lire plus</a></p>
        </div>
        <div class="card__footer">
          <div class="user">
            <div class="user__info">
              <small>{{ $post->created_at }}</small>
            </div>
          </div>
        </div>
      </div>
    @endforeach

</div>
@endsection
