<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

	public function thread()
	{
		$this->belongsTo('App\Thread');
	}

	public function contact()
	{
		$this->belongsTo('App\Contact');
	}

}
