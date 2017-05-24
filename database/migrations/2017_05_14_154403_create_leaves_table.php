<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('leaves', function (Blueprint $table) {          
            $table->increments('id');
            $table->integer('emp_id')->unsigned();
            $table->integer('leave_type_id')->unsigned();
            $table->integer('leave_cat_id')->unsigned();
            $table->date('from');
            $table->date('to');
            $table->string('note');
            $table->timestamps();
            
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');;
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');;
            $table->foreign('leave_cat_id')->references('id')->on('leave_categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('leaves');
    }
}
