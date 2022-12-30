@extends('template.app')

@section('content')
    <div class="row">
         @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
        @endif
        @if ($commandes != "")
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Produits</th>
                {{-- <th scope="col">Prix</th> --}}

              </tr>
            </thead>
            <tbody>
            @foreach ($commandes as $commande)

                   @foreach (getCommande($commande->produits) as $produit)
                   <tr>
                       <td class=>{{ $produit }}</td>
                   </tr>
                   @endforeach

            @endforeach

            </tbody>
        </table>

        @else
        <div class="alert alert-success">
             Vous n'avez pas de commande
        </div>
        @endif
    </div>
@endsection
