<?php 

namespace App\Http\Controllers ; //Définir l'emplacement 

class MonnayeurController extends Controller {
	public function coins() {
        $tCoinStock = ["200"=>100,"100"=>100,"50"=>100,"20"=>100,"10"=>100,"5"=>100];
    	return view('monnayeur', ["coins" => $tCoinStock]);
    }
}

/*
class MonnayeurController extends Controller {
	public function coins() {
        $coins = [200, 100, 50, 20, 10, 5];
        $stock=[100, 100, 100, 100, 100, 100];
    	return view('monnayeur', ["coins" => $coins, "stock" => $stock]);
    }
}

            @foreach($coins as $val)
            <tr>
                <td>{{$val}}</td>
                <td><?php $i=0; ?> {{$stock[$i]}}</td>
                <?php $i++; ?>
            </tr>
            @endforeach
*/