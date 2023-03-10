<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',50)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('region_id');
            $table->string('website',191);
            $table->string('competitor_website',191)->nullable();
            $table->integer('products_services_count')->nullable();
            $table->text('keywords')->nullable();
            $table->enum('status',['PENDING','ASSIGNED','REVISION','COMPLETED'])->default('PENDING');
            $table->enum('payment_status',['UNPAID','PAID','PARTIAL','MILESTONE'])->default('UNPAID');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('region_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_projects');
    }
}
