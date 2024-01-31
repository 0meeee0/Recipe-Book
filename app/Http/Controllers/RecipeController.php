<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;

class RecipeController extends Controller
{
    public function post(){
        // $recipes = Recette::all();
        return view('layouts.post');
    }

    public function home(){
        $recipes = Recette::all();
        return view('welcome', ['recipes' => $recipes]);
    }
    
    public function create(){
        return view('layouts.create');
    }

    public function store(Request $request){
        // dd($request->image);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);

        $newRecipe = Recette::create($data);
        return redirect('/');

    }
}
