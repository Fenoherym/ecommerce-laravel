@extends('template.app')

@section('content')

<div class="row">

    <div class="col-md-5">
        <img src="{{ asset('storage/'.$produit->photoUrl) }}" alt="" height="400px" width="400px">
    </div>

    <div class="col-md-7">
        <div class="product-details" style="text-align: justify">
            <h2 class="product-name">{{ $produit->name }}</h2>

            <div>
                <h3 class="product-price">{{ getPrice($produit->price) }} $</h2> {{--<del class="product-old-price">$990.00</del> --}}</h3>
                <span class="product-available">En Stock</span>
            </div>
            <p>{!!  $produit->description !!}</p>
{{--
            <div class="product-options">
                <label>
                    Size
                    <select class="input-select">
                        <option value="0">X</option>
                    </select>
                </label>
                <label>
                    Color
                    <select class="input-select">
                        <option value="0">Red</option>
                    </select>
                </label>
            </div> --}}


                <form action="{{ route('carte.store') }}" method="post" class="mt-3">
                    @csrf
                    <label for="qty">Quantité: </label>
                    <select name="qty" id="qty" class="custom-select">
                        @for ($i =1; $i<=6; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <input type="hidden" name="id" value="{{ $produit->id }}">
                    <input type="hidden" name="title" value= "{{ $produit->title }}">
                    <input type="hidden" name="price" value="{{ getPrice($produit->price) }}">
                <div class="add-to-cart">
                    <button class="add-to-cart-btn mt-3"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                </div>
                </form>


            <ul class="product-btns">
                {{-- <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li> --}}
                {{-- <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li> --}}
            </ul>

            <ul class="product-links">
                <li>Category:</li>
                <li><a href="#">{{ $produit->category->name }}</a></li>
                {{-- <li><a href="#">Accessories</a></li> --}}
            </ul>
{{--
            <ul class="product-links">
                <li>Share:</li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
            </ul> --}}

        </div>
    </div>
    <!-- /Product details -->

    <!-- Product tab -->
    <div class="col-md-12">
        <div id="product-tab">
            <!-- product tab nav -->
            <ul class="tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                {{-- <li><a data-toggle="tab" href="#tab2">Details</a></li> --}}
                <li><a data-toggle="tab" href="#tab3">Avis</a></li>
            </ul>
            <!-- /product tab nav -->

            <!-- product tab content -->
            <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{!!  $produit->description !!}</p>
                        </div>
                    </div>
                </div>
                <!-- /tab1  -->

                <!-- tab2  -->
                {{-- <div id="tab2" class="tab-pane fade in">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div> --}}
                <!-- /tab2  -->

                <!-- tab3  -->
                <div id="tab3" class="tab-pane fade in">
                    <div class="row">
                        <!-- Rating -->
                        {{-- <div class="col-md-3">
                            <div id="rating">
                                <div class="rating-avg">
                                    <span>4.5</span>
                                    <div class="rating-stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <ul class="rating">
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div style="width: 80%;"></div>
                                        </div>
                                        <span class="sum">3</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div style="width: 60%;"></div>
                                        </div>
                                        <span class="sum">2</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                    <li>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="rating-progress">
                                            <div></div>
                                        </div>
                                        <span class="sum">0</span>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- /Rating -->

                        <!-- Reviews -->
                        <div class="col-md-6">
                            @php
                                $i = 0;
                            @endphp
                             @foreach ($produit->reviews as $review)
                             @php
                                 $i++
                             @endphp
                             <div id="reviews">
                                <ul class="reviews">
                                    <li>
                                        <div class="review-heading">
                                            <h5 class="name">{{ $review->user->name }}</h5>
                                            <p class="date">{{ $review->created_at }}</p>
                                            <div class="review-rating">
                                                @for ($i=1; $i<=5; $i++)
                                                    @if ($i > $review->stars)
                                                        <i class="fa fa-star-o empty"></i>
                                                    @else
                                                        <i class="fa fa-star"></i>
                                                    @endif


                                                @endfor
                                            </div>
                                        </div>
                                        <div class="review-body">
                                            <p>{{ $review->content }}</p>
                                        </div>
                                    </li>
                                </ul>
                                {{-- <ul class="reviews-pagination">
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul> --}}
                            </div>
                             @endforeach
                             @if($i==0)

                                <div class="alert alert-secondary" style="background-color: #cac4c4">
                                    Aucun commentaires sur ce produit
                                </div>

                            @endif
                        </div>


                        <!-- /Reviews -->

                        <!-- Review Form -->
                        <div class="col-md-3">
                            @auth
                                <div id="review-form">
                                    <form class="review-form" method="post" action="{{ route('review.store') }}">
                                        @csrf
                                        <input class="input" type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                        <input class="input" type="text" name="produit_id" value="{{ $produit->id }}" hidden>
                                        <textarea class="input" placeholder="Votre avis" name="content" required="required"></textarea>
                                        <div class="input-rating">
                                            <span>Votre etoiles: </span>
                                            <div class="stars">
                                                <input id="star5" name="stars" value="5" type="radio"><label for="star5"></label>
                                                <input id="star4" name="stars" value="4" type="radio"><label for="star4"></label>
                                                <input id="star3" name="stars" value="3" type="radio"><label for="star3"></label>
                                                <input id="star2" name="stars" value="2" type="radio"><label for="star2"></label>
                                                <input id="star1" name="stars" value="1" type="radio"><label for="star1"></label>
                                            </div>
                                        </div>
                                        <button class="primary-btn">Envoyer</button>
                                    </form>
                                </div>
                            @else
                                <a href="/login" class="btn btn-success">Se connecter pour ajouter un avis</a>
                            @endauth

                        </div>
                        <!-- /Review Form -->
                    </div>
                </div>
                <!-- /tab3  -->
            </div>
            <!-- /product tab content  -->
        </div>
    </div>
</div>

@endsection
