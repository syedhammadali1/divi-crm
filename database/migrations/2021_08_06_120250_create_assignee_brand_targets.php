<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigneeBrandTargets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignee_brand_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_target_id')->unsigned();
            $table->tinyInteger('assignee_type')->comment('1=>Sales Manager,2=>Support Manager, 3=>Own');
            $table->bigInteger('assigner_emp_id')->nullable();
            $table->double('target_amount',8)->nullable();
            $table->double('achieved_amount',8)->nullable();
            $table->date('target_month')->nullable();
            $table->bigInteger('create_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //add foreign keys
            $table->foreign('brand_target_id')->references('id')->on('brand_targets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignee_brand_targets');
    }
}
