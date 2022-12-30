@extends('template.app')

@section('content')
@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif

<div class="row">

        	<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
                            @foreach ($categories as $category)
                                <div class="checkbox-filter">
                                    <div class="input-checkbox">
                                        <label for="category-1">
                                            <span></span>
                                            <a href="{{ route('produit.search').'?category_id='.$category->id }}">{{ $category->name }}</a>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
						</div>
						<!-- /aside Widget -->
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
					@if (count($produits) != 0)
						<!-- store products -->
						<div class="row">
                            @foreach ($produits as $produit)
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="{{ asset('storage/'.$produit->photoUrl) }}" alt="" height="250px" style="object-fit: cover;">
									</div>
									<div class="product-body">
										<p class="product-category">{{ $produit->category->name }}</p>
										<h3 class="product-name"><a href="{{ route('produit.show', $produit->id) }}">{{ getExcerpt($produit->title, 60) }}</a></h3>
										<h4 class="product-price">
                                            @if ($produit->isNew)
                                                {{ round(getPrice($produit->price)/3, 2) }} $
                                                <del class="product-old-price">{{ getPrice($produit->price) }} $</del>
                                            @else
                                                {{ getPrice($produit->price) }} $
                                            @endif
                                        </h4>
										{{-- <div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div> --}}
										<div class="product-btns">
											{{-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> --}}
											{{-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> --}}
										</div>
									</div>
									<div class="add-to-cart">
										<form action="{{ route('carte.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $produit->id }}">
                                            <input type="hidden" name="title" value= "{{ $produit->title }}">
                                            <input type="hidden" name="price" value="@if ($produit->isNew)
                                                                                        {{ round(getPrice($produit->price)/3, 2) }}
                                                                                    @else
                                                                                        {{ getPrice($produit->price) }}
                                                                                    @endif">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                        </form>
									</div>
								</div>
							</div>
                            @endforeach


                        @if (Route::currentRouteName() == 'produits.index')
                            {{ $produits->links() }}
                        @endif
                    </div>
					@else
						<div class="alert alert-success text-center">
							 Auncun résultats pour votre recherche
						</div>
					@endif
				</div>



</div>


@endsection
