<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\User;
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
            return abort(404);
        }
        $ventes = Vente::orderBy('id');
        $boissons = Boisson::orderBy('name');
        $users = User::orderBy('name')->get();
        $totalGlobal = $ventes->sum('price');
        if (Auth::user()->role === 'client') {
                $ventes->where('user_id', $userId);
                $boissons->whereHas('ventes', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
        }
        $data =[
            'sales' => $ventes->get(),
            'total' => $ventes->sum('price'),
            'boissons' => $boissons->get(),
            'users' => $users,
            'totalGlobal' => $totalGlobal,
        ];

        return view('ventes.index', $data);
    }

    // Function to make searches
    public function search (Request $request){
        $ventes = Vente::orderBy('id');
        $totalGlobal = $ventes->sum('price');
        if($request->input('boisson_id') > 0) {
            $idBoisson = $request->input('boisson_id');
            $ventes = $ventes->where('boisson_id', $idBoisson);
        }else {
            $idUser = $request->input('user_id');
            $ventes = $ventes->where('user_id', $idUser);
        }
        $data = [
            'sales' => $ventes->get(),
            'total' => $ventes->sum('price'),
            'boissons' => Boisson::orderBy('name')->get(),
            'users' => User::orderBy('id')->get(),
            'totalGlobal' => $totalGlobal,
        ];
        return view('ventes.index', $data);
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

        // Modifier le stock du sucre selon la vente
        $sucre = Ingredient::where('name','Sucre')->first();
        $sucre->stock-= $data['nbSugar'];
        $sucre->save();
        // Modifier le stock des ingredients selon la vente
        $ings = $vente->boisson->ingredients;
        foreach ($ings as $ing){
            $ing->stock = $ing->stock - $ing->pivot->quantity;
            $ing->save();
        }
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
