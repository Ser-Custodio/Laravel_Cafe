<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Boisson;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingredients.list',['ingredient' => Ingredient::orderBy('name')->get()]);
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show',['ingredient'=> $ingredient]);   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
        ];
        $addIng = Ingredient::create($data);
        return redirect()->route('ingredients.index')->with('success','Your ingredient '.$addIng->name.' was added to the liste!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', ['ingredients' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ingredient)
    {
        $modIng = Ingredient::find($ingredient);
        
        $data = [
            'stock' => $request->input('stock'),
        ];
        
        $modIng->update($data);

        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        if($ingredient->boisson->count() > 0){
            $liste = '';
            $boissons = $ingredient->boisson;
            foreach ($boissons as $boisson){
                $liste .= "<li>" . $boisson->name ."; </li>";
            }
            $info = "Can't delete this Ingredient. Associated with drinks: " . $liste;
            return back()->with('error', $info);
        }
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('warning','The ingredient '. $ingredient->name .' has been deleted');    
    }
}
