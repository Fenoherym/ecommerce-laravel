@extends('layouts.app')

@section('content')
<div class="container">
   <form action="{{ route('admin.produit.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titre:</label>
          <input type="text" class="form-control @error('title') is-invalid

          @enderror" id="title" name="title" placeholder="Titre..">
          @error('title')
            {{ $message }}
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Prix:</label>
          <input type="number" class="form-control @error('price') is-invalid

          @enderror" id="price" name="price" placeholder="prix..">
          @error('price')
             {{ $message }}
          @enderror
        </div>
        <div class="form-group">
          <label for="category_id">Category: </label>
          <select class="form-control" id="category_id" name="category_id">
            @foreach (getCategories() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

          </select>
        </div>
        <div class="form-group">
          <label for="description">Contenue: </label>
          <textarea class="form-control @error('description') is-invalid

          @enderror" id="description"  rows="3" name="description"></textarea>

          @error('description')
          {{ $message }}
          @enderror
        </div>
        <div class="custom-file my-2">
            <input type="file" class="custom-file-input" id="photoUrl" name="photoUrl" class="@error('photoUrl') is-invalid
            @enderror">
            <label class="custom-file-label" for="photoUrl" >Choose file</label>
            @error('photoUrl')
            {{ $message }}
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="isNew" id="isNew" value="1">
            <label class="form-check-label" for="isNew">
                Nouveau produit
            </label>
        </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>

</div>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection


