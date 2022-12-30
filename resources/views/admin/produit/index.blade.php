@extends('layouts.app')

@section('form-search')
<form class="d-flex me-5" method="get" action="{{ route('admin.produit.search') }}">
    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="q">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
  </form>
@endsection

@section('content')
    <div class="container mt-3">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
        @endif

        <a href="{{ route('admin.produit.create') }}"><button class="btn btn-success">Ajouter un article</button></a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titre</th>
                <th scope="col">Nouveau produit</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
            @foreach ($produits as $produit)
            @php
                $i++
            @endphp
                <tr>
                    <th scope="row">{{ $produit->title }}</th>
                    <th scope="row">
                        @if($produit->isNew)
                           OUI
                        @else
                           NON
                        @endif
                    </th>
                    <td class="col-md-3">
                            <button class="btn btn-danger"><a href="{{ route('admin.produit.delete', $produit->id) }}" class="text-white">Supprimer</a></button>
                            <button class="btn btn-warning"><a href="{{ route('admin.produit.edit', $produit->id) }}" class="text-white">Modifier</a></button>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @if(!isset($_GET['q']))
            {{ $produits->links() }}
        @endif
        @if ($i==0)
        <div class="alert alert-success">
            Aucun résultats trouvés
        </div>
        @endif
    </div>
@endsection
