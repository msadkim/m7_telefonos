<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefon extends Model
{
    //
	protected $fillable = [
		'titol', 'contingut',
	];

	public function comments(){
		return $this->hasMany('App\Comment');
	}
}
