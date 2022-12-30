<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        if(!Gate::allows('admin')){
            abort(403);
        }
        return view('admin.category.create');
    }

    public function store(Request $request){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'max:255', 'min:3', 'unique:categories']
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Categorie ajoutée');
    }

    public function destroy($id){
        if(!Gate::allows('admin')){
            abort(403);
        }
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Categorie supprimée');
    }

    public function edit($id){
        if(!Gate::allows('admin')){
            abort(403);
        }
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'max:255', 'min:3', 'unique:categories']
        ]);

        Category::findOrFail($id)->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Categorie modifiée');

    }
}
