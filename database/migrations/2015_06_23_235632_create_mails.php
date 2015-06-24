<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMails extends Migration
{
	public function up()
	{
		Schema::create('mails', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('thread_id');
			$table->integer('contact_id');
			$table->string('message_id', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('mails');
	}
}
