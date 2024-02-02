<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use Illuminate\Support\Facades\Storage;


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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size as needed
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public'); // Store the image in the 'recipe_images' folder within the 'public' disk
            $data['image'] = $imagePath;
        }

        // Create a new recipe
        $newRecipe = Recette::create($data);

        return redirect('/');
    }

    public function edit( $recipe){
        // dd($recipe);
        
        $recipe = Recette::find($recipe);
        // dd($recipe);
        return view('layouts.edit', compact('recipe'));
    }

    public function update($Recette, Request $request)
    {
        $recipe = Recette::find($Recette);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image update, but validate if provided
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image before storing the new one
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

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
