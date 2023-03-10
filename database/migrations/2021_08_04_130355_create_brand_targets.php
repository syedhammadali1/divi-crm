<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandTargets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('create_by')->nullable();
            $table->date('target_month')->nullable();
            $table->double('target_amount',8)->nullable();
            $table->bigInteger('brand_manager_id')->nullable();
            $table->tinyInteger('is_assignee')->nullable()->default(0);
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
        Schema::dropIfExists('brand_targets');
    }
}
