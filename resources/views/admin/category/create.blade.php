@extends('layouts.app')

@section('content')
<div class="container">
   <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="name">Category:</label>
          <input type="text" class="form-control @error('name') is-invalid

          @enderror" id="name" name="name" placeholder="Category..">
          @error('name')
            {{ $message }}
          @enderror
        </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>

</div>
@endsection


