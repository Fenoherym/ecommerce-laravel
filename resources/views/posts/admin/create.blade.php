@extends('layouts.app')

@section('content')
<div class="container">
   <form action="/posts/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titre:</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Titre..">
        </div>
        <div class="form-group">
          <label for="category_id">Category: </label>
          <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

          </select>
        </div>
        <div class="form-group">
          <label for="content">Contenue: </label>
          <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="custom-file mt-2">
            <input type="file" class="custom-file-input" id="photoUrl" name="photoUrl">
            <label class="custom-file-label" for="photoUrl" >Choose file</label>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>

</div>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection

