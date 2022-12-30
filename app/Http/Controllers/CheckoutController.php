<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Stripe::setApiKey('sk_test_51Jg0xZHK50yV0bEAd2oemspM6xRTtf50mKRYwFgEOHGK7Xvx3JUlAVb3J9ZX4fzlaprcYRIKkKhEfizOecCK5SYh00a9pZ2UNQ');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()*100),
            'currency' => 'eur'
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout.index', [
            'clientSecret' =>$clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->payment_intent_id = $request->payment_itent_id;
        $order->payment_created_at = "2022-02-17 09:58:56";
        $order->amount = $request->amount;

        $produits = [];
        $i = 0;
        foreach (Cart::content() as $produit) {
            $produits['produit_'. $i][] = $produit->model->title;
            $produits['produit_'. $i][] = $produit->model->price;
            $i++;
        }

        $order->produits = serialize($produits);
        $order->user_id = Auth::user()->id;

        $order->save();

        Cart::destroy();

        return redirect('/nos-produits')->with('success', 'Merci pour votre commande');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
