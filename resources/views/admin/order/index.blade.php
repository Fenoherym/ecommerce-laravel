@extends('layouts.app')

@section('content')

<div class="container mt-3">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
    @endif
    <!-- Button trigger modal -->


  <!-- Modal -->

  </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Client</th>
            <th scope="col">Date de commande</th>
            <th scope="col">Commande</th>
            <th scope="col">Articles</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td scope="row">{{ $order->user->name }}</td>
                <td scope="row">{{ date_format($order->created_at, 'Y-m-d H:i') }}</td>
                <td scope="row">
                    @if($order->isValidate)
                        Livraison en cours
                    @else
                        Commande annuler
                    @endif
                </td>
                <td scope="row">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id }}">
                        Voir les articles
                    </button>
                    <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Articles</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @foreach (getCommande($order->produits) as $produit)
                                    <p>{{ $produit }}</p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>

                            </div>
                          </div>
                      </div>
                </td>
                <td scope="row">
                    <form action="{{ route('admin.order.validate', $order->id) }}" method="POST">
                        @csrf
                        <input type="text" name="isValidate" value="{{ $order->isValidate }}" hidden>
                    @if($order->isValidate)
                        <button type="submit" href="#" class="btn btn-danger">Annuler la commande</button>
                    @else
                        <button type="submit" href="#" class="btn btn-success">Revalider la commande</button>
                    @endif
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>

@endsection
