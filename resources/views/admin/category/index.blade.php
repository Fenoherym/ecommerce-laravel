@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
        @endif
        <a href="{{ route('admin.category.create') }}"><button class="btn btn-success">Ajouter une categorie</button></a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Categories</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->name }}</th>
                    <td class="col-md-3">
                            <a  onclick="alert('La suppression de ce categorie entraine la suppression de tous lesproduits associés')" href="{{ route('admin.category.delete', $category->id) }}" class="text-white btn btn-danger">Supprimer</a>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="text-white btn btn-warning">Modifier</a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
