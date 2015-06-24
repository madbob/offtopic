<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLists extends Migration
{

	public function up()
	{
		Schema::create('mailing_lists', function (Blueprint $table) {
			$table->increments('id');
			$table->string('address');
			$table->string('subscription');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mailing_lists');
	}
}
