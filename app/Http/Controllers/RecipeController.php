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

    public function edit( $recipe){
        // dd($recipe);
        
        $recipe = Recette::find($recipe);
        // dd($recipe);
        return view('layouts.edit', compact('recipe'));
    }

    public function update($Recette, Request $request){
            $recipe = Recette::find($Recette);
            
            $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);

        $recipe->update($data);
        return redirect('/');
    }

    public function delete($Recette){
        $recipe = Recette::find($Recette);
        $recipe->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipesQuery = Recette::query();

        if ($query) {
            $recipesQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                            ->orWhere('category', 'like', '%' . $query . '%');
            });
        }

        $recipes = $recipesQuery->get();
        return view('layouts.index', compact('recipes'));
    }
}
