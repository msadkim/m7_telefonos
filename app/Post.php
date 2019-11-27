<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $fillable = [
		'titol', 'contingut', 'user_id',
	];

	public function use(){
		return $this->belongsTo('App\User');
	}

	public function comments(){
		return $this->hasMany('App\Comment');
	}

}
