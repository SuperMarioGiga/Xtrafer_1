<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		if (!Schema::hasTable('password_reset')) {
			Schema::create('password_reset', function (Blueprint $table) {
				$table->string('email')->index();
				$table->string('token')->index();
				$table->timestamp('created_at')->nullable();
			});
		}
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('password_reset');
	}
}
