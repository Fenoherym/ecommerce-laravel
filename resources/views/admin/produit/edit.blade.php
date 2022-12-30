@extends('layouts.app')

@section('content')
<div class="container">
   <form action="{{ route('admin.produit.update', $produit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titre:</label>
          <input type="text" class="form-control @error('title') is-invalid

          @enderror" id="title" name="title" placeholder="Titre.." value="{{ $produit->title }}">
          @error('title')

          @enderror
        </div>
        <div class="form-group">
          <label for="price">Prix:</label>
          <input type="number" class="form-control @error('price') is-invalid

          @enderror" id="price" name="price" placeholder="prix.." value="{{ $produit->price }}">
          @error('price')

          @enderror
        </div>
        <div class="form-group">
          <label for="category_id">Category: </label>
          <select class="form-control" id="category_id" name="category_id">
            @foreach (getCategories() as $category)
                <option value="{{ $category->id }}" @if ($category->id===$produit->category_id)
                        selected
                @endif>{{ $category->name }}</option>
            @endforeach

          </select>
        </div>
        <div class="form-group">
          <label for="description">Contenue: </label>
          <textarea class="form-control @error('description') is-invalid

          @enderror" id="description"  rows="3" name="description">{{ $produit->description }}</textarea>

          @error('description')

          @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="isNew"  id="flexRadioDefault1"  value="1"
            @if ($produit->isNew)
                checked
            @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Nouveau produit
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="isNew" id="flexRadioDefault2" value="0"
            @if (!$produit->isNew)
                checked
            @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                N'est plus un nouveau produit
            </label>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
      </form>

</div>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection


