<?php

namespace App\Http\Controllers; //Définir l'emplacement

// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Boisson;
use App\Ingredient;
use Illuminate\Http\Request;

class BoissonsController extends Controller
{

    public function listeBoissons()
    {
        $boissons = Boisson::orderBy('name', 'asc')->get();

        return view('boissons', ["boisson" => $boissons]);
    }

//    public function listeBoissonsDispo()
//    {
//        $boissons = Boisson::orderBy('name', 'asc')->get();
//        $nbSugar = Ingredient::where('name','Sucre')->first()->stock;
//
//
//        return view('front_office.machine', ["boisson" => $boissons, 'nbSugar' => $nbSugar]);
//    }
  // liste de boissons disponibles selon les stocks
    public function listeBoissonsDispo()
    {
        $boissons = Boisson::orderBy('name', 'asc')->get();
        $nbSugar = Ingredient::where('name','Sucre')->first()->stock;
        // Modifier le stock des ingredients
        foreach ($boissons as $boisson) {
            if ($boisson->ingredients->count() < 1) {
                $boisson->dispo = false;
            } else {
                $ings = $boisson->ingredients;
                $boisson->dispo = true;
                foreach ($ings as $ing) {
                    if ($ing->stock < $ing->pivot->quantity) {
                        $boisson->dispo = false;
                    };
                };
            };
        };
        $data = [
            'boisson' => $boissons,
            'nbSugar' => $nbSugar
        ];

        return view('front_office.machine', $data);
    }

    public function prixCroissant()
    {
        $requette = Boisson::orderBy('price')->get();
        return view('boissons', ["boisson" => $requette]);
    }


    public function editBoissons(Boisson $boisson)
    {
        $recette = $boisson->ingredients;
        return view('editBoissons', ["boisson" => $boisson, "recette" => $recette]);
    }

    public function addDrink()
    {
        return view('addDrink');
    }


    //Returns the form view and passes the ingredient list
    public function formRecipe(Boisson $boisson)
    {
        $ingredients = Ingredient::orderBy('name')->get();
        $data = [
            'boisson' => $boisson,
            'ingredients' => $ingredients,
            'recette' => $boisson->ingredients
        ];
        return view('addRecipe', $data);
    }

    //Add an ingredient to our drink and returns to the same page until we say its finished
    public function addRecipe(Request $request, Boisson $boisson)
    {
        $data = [
            'ingredient_id' => $request->input('ingredient_id'),
            'quantity' => $request->input('quantity'),
            'boisson' => $boisson
        ];
        $ingTable = Ingredient::find($request->input('ingredient_id'));
        $ingName = $ingTable->name;
        if ($boisson->ingredients()->find($request->input('ingredient_id'))) {
            return back()->with('error', "L'ingredient \"" . $ingName."\" est déjà utilisé!");
        }
        $boisson->ingredients()->attach($request->input('ingredient_id'), ['quantity' => $request->input('quantity')]);
        return redirect()->route('formRecipe', $data);

    }


    public function deleteIng(Request $request, Boisson $boisson)
    {
        $ingredient = $request->input('ingredient');
        $boisson->ingredients()->detach($ingredient);
        return redirect()->route('formRecipe', ['boisson' => $boisson]);
    }


    public function modDrink(Boisson $boisson)
    {
        return view('modifyDrink', ['boisson' => $boisson]);
    }


    public function store(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ];
        $drinkExist = Boisson::where('name',$data['name'])->get();
        if($drinkExist->isNotEmpty()){
            return back()->with('error','La boisson '.$data['name'].' existe deja dans la liste');
        }
        $addDrink = Boisson::create($data);
        return redirect()->route('addRecipe', ['boisson' => $addDrink->id]);
    }

    public function update(Request $request, $boisson)
    {
        $modDrink = Boisson::find($boisson);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'active' => $request->input('active'),
        ];

        $modDrink->name = $data['name'];
        $modDrink->price = $data['price'];
        $modDrink->active = $data['active'];
        $modDrink->save();

        return redirect('boissons');
    }
    public function delete(Boisson $boisson)
    {
        if($boisson->ventes()->count() > 0){
            $boisson->active = false;
            $boisson->save();
            return back()->with('info', 'La boisson "'.$boisson->name.'" a des ventes associées, alors elle a été désactivée.');
        };
            $boisson->delete();
            return redirect('boissons')->with('info', 'La boisson "'.$boisson->name.'" a bien été supprimé.');


    }

}

