<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('month');
            $table->string('period');
            $table->integer('year');
            $table->integer('bonuses');
            $table->integer('numberofclients');

            //Foreign Key
            $table->unsignedInteger('salesrep_id');
            $table->foreign('salesrep_id')->references('id')->on('salesrep')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll');
    }
}
