<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',50)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('project_id');
            $table->foreignId('reference_style_id')->constrained();
            $table->foreignId('number_of_words_id')->constrained();
            $table->foreignId('academic_level_id')->nullable()->constrained();
            $table->foreignId('currency_id')->nullable()->constrained();
            $table->string('paper_topic',100)->nullable();
            $table->string('paper_subject',100)->nullable();
            $table->integer('number_of_slides')->nullable();
            $table->integer('number_of_references')->nullable();
            $table->enum('standard_of_work',['PASS','MERIT','DISTINCTION']);
            $table->enum('rephrasing_new',['NEW','REPHRASING'])->default('NEW');
            $table->integer('industry_id')->nullable();
            $table->string('keywords',191)->nullable();
            $table->string('website',50)->nullable();
            $table->enum('status',['PENDING','ASSIGNED','REVISION','COMPLETED'])->default('PENDING');
            $table->enum('payment_status',['UNPAID','PAID','PARTIAL','MILESTONE'])->default('UNPAID');
            $table->enum('content_type',['ACADEMIC','CREATIVE']);
            $table->integer('content_project_type')->nullable();
            $table->text('deleted_reason')->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_projects');
    }
}
