<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

	public function thread()
	{
		return $this->belongsTo('App\Thread');
	}

	public function contact()
	{
		return $this->belongsTo('App\Contact');
	}

	public function printableDate()
	{
		return $this->created_at->format('d/m/Y G:i:s');
	}

}
