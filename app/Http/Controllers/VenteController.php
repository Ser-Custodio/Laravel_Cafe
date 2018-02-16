<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use App\Vente;
use App\Boisson;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        if (!Auth::check()) {
            return redirect()->route('machine')->with('error', 'You don\'t have permission for that');
        }
        $ventes = Vente::orderBy('id');
        $boissons = Boisson::orderBy('name');
        if (Auth::user()->role === 'client') {
                $ventes->where('user_id', $userId);
                $boissons->whereHas('ventes', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
        }
        //$count = $count->get();

        $ventes = $ventes->get();
        $total = $ventes->sum('price');
        $boissons = $boissons->get();

        return view('ventes.index', ['sales' => $ventes, 'total' => $total, 'boissons' => $boissons/*, 'count'=>$count*/]);

        // THE CODE WE HAD BEFORE

//        }else if (Auth::user()->role === 'client') {
//            $ventes = Vente::orderBy('id')->where('user_id', $userId)->get();
//            $total = $ventes->sum('price');
//            return view('ventes.index', ['sales' => $ventes, 'total' => $total]);
//        }else{
//            $ventes = Vente::all();
//            $ventes->sum('price');
//            return view('ventes.index', ['sales'=> $ventes, 'total' => $total]);
//        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = Auth::id();
        if (!Auth::check()) {
            $user = 1;
        };
        $price = Boisson::find($request->input('drink'))->price;
        $data = [
            'nbSugar' => $request->input('nbSugar'),
            'boisson_id' => $request->input('drink'),
            'price' => $price,
            'user_id' => $user
        ];
        $vente = Vente::create($data);

        // Modifier le stock du sucre
        $sucre = Ingredient::where('name','Sucre')->first();
        $sucre->stock-=$request->input('nbSugar');
        $sucre->save();

        // Modifier le stock des ingredients


        return redirect()->route('machine')->with('success', 'Enjoy your Drink');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
