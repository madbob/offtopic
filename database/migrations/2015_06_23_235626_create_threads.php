<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreads extends Migration
{
	public function up()
	{
		Schema::create('threads', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('threads');
	}
}
