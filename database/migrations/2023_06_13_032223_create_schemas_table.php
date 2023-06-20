<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('schemas')) {
            Schema::create('schemas', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('task_id')->nullable();
                $table->unsignedBigInteger('action_id')->nullable();
                $table->text('path')->nullable();
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
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schemas');
    }
}
