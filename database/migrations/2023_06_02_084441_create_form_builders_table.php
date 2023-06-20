<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_builders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('action_id')->nullable();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->string('name');
            $table->text('path');
            $table->longText('code');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreign('task_id')
                    ->references('id')
                    ->on('tasks')
                    ->onDelete('SET NULL')
                    ->onUpdate('cascade');
            $table->foreign('action_id')
                    ->references('id')
                    ->on('actions')
                    ->onDelete('SET NULL')
                    ->onUpdate('cascade');
            $table->foreign('component_id')
                    ->references('id')
                    ->on('components')
                    ->onDelete('SET NULL')
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
        Schema::dropIfExists('form_builders');
    }
}
