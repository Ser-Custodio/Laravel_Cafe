<?php 

namespace App\Http\Controllers ; //Définir l'emplacement 

// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Boisson;
use App\Ingredient;
use Illuminate\Http\Request;

class BoissonsController extends Controller {

	public function listeBoissons(){
		$boissons = Boisson::orderBy('name','asc')->get();
		return view('boissons', ["boisson" => $boissons]);
	}

	public function editBoissons(Boisson $boisson){
		$recette = $boisson->ingredients;
        return view('editBoissons', ["boisson" => $boisson, "recette" => $recette]);
	}

	//Add an ingredient to our drink and returns to the same page until we say its finished
	

	public function prixCroissant(){
		$requette = Boisson::orderBy('price')->get();
		return view('triBoissons', ["boisson" => $requette]);
	}

	public function addDrink(){
		return view('addDrink');
	}

	public function addRecipe (Request $request, Boisson $boisson){
		$data =[

			'ingredient_id' => $request->input('ingredient_id'),
			'quantity' => $request->input('quantity'),
			'boisson' => $boisson
		];
		
		$boisson->ingredients()->attach($request->input('ingredient_id'),['quantity'=>$request->input('quantity')]);
		return redirect()->route('formRecipe', $data);
	}

	public function formRecipe (Boisson $boisson){
		$ingredients = Ingredient::all();
		$data = [
				'boisson' => $boisson,
				'ingredients' => $ingredients,
				'recette' => $boisson->ingredients
		];
		return view('addRecipe', $data);
	}




	public function modDrink(Boisson $boisson){
		return view('modifyDrink', ['boisson' => $boisson]);
	}

	

	public function store(Request $request){

		$data = [
			'name' => $request->input('name'),
			'price' => $request->input('price'),
		];

		$addDrink = Boisson::create($data);
		return redirect()->route('addRecipe',['boisson' => $addDrink->id]);
	}

	public function update(Request $request, $boisson){
		$modDrink = Boisson::find($boisson);
		
		$data = [
			'name' => $request->input('name'),
			'price' => $request->input('price'),
		];
		
		$modDrink->name = $data['name'];
		$modDrink->price = $data['price'];
		$modDrink->save();

		return redirect('boissons');
	}	

	public function delete (Boisson $boisson){
		$boisson->delete();
		return redirect('boissons');
	}

}

