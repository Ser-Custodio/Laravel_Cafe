<?php 

namespace App\Http\Controllers ; //Définir l'emplacement 

class VentesController extends Controller {
	public function listeVentes() {
    	$ventes = [
    		["NumVente" => 1, "Boisson" => "Café Long", "Sucre"=> 1, "Date"=>"17/01/2018 09:05"],
    		["NumVente" => 2, "Boisson" => "Café Court", "Sucre"=> 2, "Date"=>"17/01/2018 09:51"],
    		["NumVente" => 3, "Boisson" => "Thé", "Sucre"=> 3, "Date"=>"17/01/2018 10:24"],
    		["NumVente" => 4, "Boisson" => "Café Long", "Sucre"=> 4, "Date"=>"17/01/2018 10:38"],
    		["NumVente" => 5, "Boisson" => "Café Court", "Sucre"=> 5, "Date"=>"17/01/2018 11:01"],
    		["NumVente" => 6, "Boisson" => "Thé", "Sucre"=> 5, "Date"=>"17/01/2018 12:03"],
    		["NumVente" => 7, "Boisson" => "Café Long", "Sucre"=> 5, "Date"=>"17/01/2018 12:59"],
    		["NumVente" => 8, "Boisson" => "Café Court", "Sucre"=> 0, "Date"=>"17/01/2018 13:05"],
    		["NumVente" => 9, "Boisson" => "Thé", "Sucre"=> 0, "Date"=>"17/01/2018 14:12"],
    		["NumVente" => 10, "Boisson" => "Café Long", "Sucre"=> 1, "Date"=>"17/01/2018 15:15"],
    	];
    	return view('ventes', ["sales" => $ventes]);
	}
}

