<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('action_id')->nullable();
            $table->string('name');
            $table->text('path');
            $table->longText('code');
            $table->longText('description');
            $table->timestamps();
            $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('task_id')
                    ->references('id')
                    ->on('tasks')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            $table->foreign('action_id')
                    ->references('id')
                    ->on('actions')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
