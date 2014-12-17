<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIdLinkBetweenTaskAndUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tasks', function($table) 
		{
		$table->unsignedInteger('user_id'); //->unsigned()
		
		});

		Schema::table('tasks', function($table) 
		{
		$table->foreign('user_id')->unsigned()->references('id')->on('users');
		
		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tasks', function($table) 
		{
    	$table->dropColumn('user_id');
		});
	}

}
