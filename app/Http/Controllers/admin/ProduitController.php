<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProduitController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function search(Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $produits = Produit::where('title', 'like', "%$request->q%")->get();

        return view('admin.produit.index', compact('produits'));
    }

    public function index(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $produits = Produit::latest()->paginate(5);

        return view('admin.produit.index', compact('produits'));

    }

    public function create(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        return view('admin.produit.create');
    }

    public function store(Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $request->validate([
                'title' => ['required', 'max:255', 'min:5', 'unique:posts'],
                'price' => ['required','digits_between:2,5'],
                'description' => ['required'],
                'photoUrl' => 'image'
            ]);

        $produit = new Produit();

        if($request->photoUrl != ""){
            $file_name = time() . '.' .$request->photoUrl->extension();
            $path = $request->photoUrl->storeAs(
                'produits',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }

        $produit->title = $request->title;
        $produit->price = $request->price;
        $produit->category_id = $request->category_id;
        $produit->description = $request->description;
        $produit->photoUrl = $path;
        if(isset($request->isNew)){
            $produit->isNew = $request->isNew;
        }

        $produit->save();

        return redirect()->route('admin.produit.index')->with('success', 'Article ajouté');

    }

    public function edit($id){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $produit = Produit::findOrFail($id);

        return view('admin.produit.edit', compact('produit'));
    }

    public function update(Request $request,$id){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $data = $request->validate([
                    'title' => ['required', 'max:255', 'min:5', 'unique:posts'],
                    'price' => ['required','digits_between:2,5'],
                    'category_id' => ['required'],
                    'description' => ['required'],
                    'isNew' => ['required'],
                ]);

        Produit::findOrFail($id)->update($data);
        return redirect()->route('admin.produit.index')->with('success', 'Article modifié');
    }

    public function destroy($id){

        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        Produit::findOrFail($id)->delete();

        return redirect()->route('admin.produit.index')->with('success', 'Article supprimé');

    }
}
