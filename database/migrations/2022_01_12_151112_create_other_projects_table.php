<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',50)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('project_id');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('industry_id')->constrained();
            $table->enum('status',['PENDING','ASSIGNED','REVISION','COMPLETED'])->default('PENDING');
            $table->enum('payment_status',['UNPAID','PAID','PARTIAL','MILESTONE'])->default('UNPAID');
            $table->text('deleted_reason')->nullable();
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
        Schema::dropIfExists('other_projects');
    }
}
