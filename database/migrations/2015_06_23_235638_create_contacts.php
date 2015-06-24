<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContacts extends Migration
{
	public function up()
	{
		Schema::create('contacts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('mail', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
