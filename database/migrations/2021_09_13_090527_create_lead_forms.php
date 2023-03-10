<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->string('country')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('assigner_id')->nullable();
            $table->string('feedback_option')->nullable();
            $table->string('feedback_message')->nullable();
            $table->string('brand_name')->nullable();
            $table->text('page_url')->nullable();
            $table->text('interested_in')->nullable();
            $table->string('budget')->nullable();
            $table->text('package')->nullable();
            $table->double('package_price',8)->nullable();
            $table->text('business_description')->nullable();
            $table->text('design_perception')->nullable();
            $table->text('additional_comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_forms');
    }
}
