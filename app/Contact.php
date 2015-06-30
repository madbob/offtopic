<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

	public function mails()
	{
		$this->hasMany('App\Mail');
	}

	public function printableName()
	{
		if (empty($this->name))
			return $this->mail;
		else
			return $this->name;
	}

}
