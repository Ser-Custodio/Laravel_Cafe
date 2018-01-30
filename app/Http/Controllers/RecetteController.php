<?php 

namespace App\Http\Controllers ; //Définir l'emplacement 

class RecetteController extends Controller {
	public function affiche() {
		$recette = array("Expresso" => array('Eau' => 1,
    											 'Café' => 1), 
    						 'Café Long' => array('Eau' => 2,
    						 					  'Café' => 2),
    						 'Thé' => array('Eau' => 3,
    										'Thé' => 1),
    						 'Latte' => array('Eau' => 3,
    						 				  'Café' => 1,
    						 				  'Lait' => 1));
    	return view('recettes', ["recettes" => $recette]);
	}
}
