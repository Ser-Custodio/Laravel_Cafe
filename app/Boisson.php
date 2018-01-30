<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    protected $fillable = ['name','price'];

    public function ventes(){
    	return $this->hasMany('App\Vente');
    }
    
   	public function ingredients(){
    	return $this->belongsToMany('App\Ingredient')->withPivot('quantity');
    }
}
