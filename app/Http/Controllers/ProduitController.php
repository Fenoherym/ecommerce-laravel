<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function home(){
        $produits = Produit::inRandomOrder()->take(3)->get();
        return view('home', compact('produits'));
    }
    public function index(){


        $produits = Produit::latest()->inRandomOrder()->paginate(15);
        $categories = Category::all();
        return view('produit.index', [
            'produits' => $produits,
            'categories' => $categories
        ]);
    }

    public function search(Request $request){

        if($request->category_id == "all"){
            $produits = Produit::where('title', 'like', "%$request->title%")->get();
        }else{
            $produits = Produit::where(
                'category_id',$request->category_id,
            )->where('title', 'like', "%$request->title%")
            ->get();
        }



        $categories = Category::all();
        return view('produit.index', [
            'produits' => $produits,
            'categories' => $categories
        ]);

    }

    public function show($id){
        $produit = Produit::findOrFail($id);

        return view('produit.show', compact('produit'));
    }
}
