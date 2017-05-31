<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXAssignedRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assigned_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('assigned_roles_user_id_foreign');
			$table->integer('role_id')->unsigned()->index('assigned_roles_role_id_foreign');
		    $table->integer('organization_id')->nullable()->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('restrict')->onUpdate('cascade');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assigned_roles');
	}

}
