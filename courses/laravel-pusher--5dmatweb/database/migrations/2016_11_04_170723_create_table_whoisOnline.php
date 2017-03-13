<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWhoisOnline extends Migration{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('onlines', function (Blueprint $table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('room_id');
			$table->string('timelogin');
			$table->string('timelogout');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('onlines');
	}
}
