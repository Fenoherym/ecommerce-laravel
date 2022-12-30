@extends('template.app')

@section('content')
    <div class="row">
         @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
        @endif
        @if (Cart::count() > 0)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titre</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach (Cart::content() as $produit)
                <tr>
                    <th scope="row">{{ $produit->model->title }}</th>
                    <td>
                        @if ($produit->model->isNew)
                            {{ round(getPrice( $produit->model->price)/3, 2) }}
                        @else
                            {{ getPrice( $produit->model->price) }}
                        @endif
                    $</td>
                    <td>
                        {{ $produit->qty }}
                    </td>
                    <td>
                        <form action="{{ route('carte.destroy', $produit->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">Total</th>
                <td>{{ getPrice(Cart::subtotal()*100) }} $  </td>
            </tr>

            </tbody>
        </table>
        <button class="btn btn-success"><a href="{{ route('checkout.index') }}" style="color:#fff">Passer à la caisse</a></button>
        @else
        <div class="alert alert-success">
             Votre panier est vide
        </div>
        @endif
    </div>
@endsection

@section('extra-js')
    <script>
       var selects = document.querySelectorAll('#qty');
       Array.from(selects).forEach(element => {
            element.addEventListener('change', function() {
                var rowId  = this.getAttribute('data-id');
                fetch(
                    `/panier/${rowId}`
                )
            })
       });
    </script>
@endsection
