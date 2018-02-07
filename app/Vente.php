<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model{
    
    protected $fillable = ['nbSugar'];

    public function boisson(){
    	return $this->belongsTo('App\Boisson');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}


