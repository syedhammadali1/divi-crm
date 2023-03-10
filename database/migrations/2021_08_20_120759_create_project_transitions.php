<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTransitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_transitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emp_id')->nullable()->comment('Sales & Support EmpId');
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->text('transition_id')->nullable();
            $table->double('total_cost',8)->nullable();
            $table->double('paid_cost',8)->nullable();
            $table->double('remain_cost',8)->nullable();
            $table->text('response')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //add foreign keys
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_transitions');
    }
}
