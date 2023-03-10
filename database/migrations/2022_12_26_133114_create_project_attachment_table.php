<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_attachment', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('task_id')->nullable();
            $table->string('attachment_type');
            $table->string('attachment_name');
            $table->longText('attachment_description');
            $table->string('attachment_title')->nullable();
            $table->string('path');
            $table->boolean('is_active');
            $table->boolean('is_final');
            $table->string('status')->default('none');
            $table->integer('last_status_update_by')->default(null);
            $table->integer('is_deleted');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_attachment');
    }
}
