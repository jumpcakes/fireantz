<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

	protected $fillable = [
		'team2_name',
		'game_date',
		'game_time'
	];


	public function playing() {
		return $this->belongsToMany('App\User')->withPivot('playing')->where('playing',1);
	}

}
