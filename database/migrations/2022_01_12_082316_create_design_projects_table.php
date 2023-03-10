<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',50)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->foreignId('industry_id')->constrained();
            $table->string('design_type',50);
            $table->string('company_name',50)->nullable();
            $table->string('target_audience',300)->nullable();
            $table->string('slogan',100)->nullable();
            $table->string('genre',50)->nullable();
            $table->string('where_to_use',50)->nullable();
            $table->string('primary_color',20)->nullable();
            $table->string('secondary_color',20)->nullable();
            $table->enum('new_re_design',['NEW DESIGN','RE DESIGN']);
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
        Schema::dropIfExists('design_projects');
    }
}
