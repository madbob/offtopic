<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{

	public function threads()
	{
		$this->hasMany('App\Thread');
	}

}
