
@extends('template.app')


@section('hero')

@endsection

@section('content')
<div class="row text-center">
    <h3> " Vous serez toujours mieux chez  O-Télécom "</h3>
</div>



@endsection

@section('section')

<div class="row">
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Nouveau Produit</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach (getNewProduit() as $produit)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('storage/'.$produit->photoUrl) }}" alt="" height="300px">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">Nouveau</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$produit->category->name }}</p>
                                                <h3 class="product-name"><a href="{{ route('produit.show', $produit->id) }}">{{ getExcerpt($produit->title, 50) }}</a></h3>
                                                <h4 class="product-price">{{ round(getPrice($produit->price)/3, 2) }} $<del class="product-old-price">{{ getPrice($produit->price) }} $</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
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
                                    @endforeach

                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>

{{--
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div> --}}

@endsection
