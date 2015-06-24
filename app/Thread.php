<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

	public function mails()
	{
		$this->hasMany('App\Mail')->orderBy('created_at');
	}

}
