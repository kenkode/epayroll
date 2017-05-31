<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transact', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('employee_id');
			$table->foreign('employee_id')->references('personal_file_number')->on('employee')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('account_id')->unsigned();
			$table->foreign('account_id')->references('id')->on('accounts');
			$table->string('basic_pay')->default('0.00');
			$table->string('earning_amount')->default('0.00');
			$table->string('taxable_income')->default('0.00');
			$table->string('paye')->default('0.00');
			$table->string('nssf_amount')->default('0.00');
			$table->string('vol_amount')->default('0.00');
			$table->string('nhif_amount')->default('0.00');
			$table->string('other_deductions')->default('0.00');
			$table->string('total_deductions')->default('0.00');
			$table->string('net')->default('0.00');
			$table->string('financial_month_year');
			$table->integer('organization_id')->nullable()->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('restrict')->onUpdate('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee_deductions');
	}
}
