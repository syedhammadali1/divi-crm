<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('development_projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',50)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->string('category',50);
            $table->string('platform',50)->nullable();
            $table->string('theme_color',50)->nullable();
            $table->enum('development_type',['NEW DEVELOPMENT','RE DEVELOPMENT','BUG FIXES']);
            $table->enum('status',['PENDING','ASSIGNED','REVISION','COMPLETED'])->default('PENDING');
            $table->enum('payment_status',['UNPAID','PAID','PARTIAL','MILESTONE'])->default('UNPAID');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('development_projects');
    }
}
