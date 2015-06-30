<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

	public function mails()
	{
		return $this->hasMany('App\Mail')->orderBy('created_at', 'desc');
	}

}
