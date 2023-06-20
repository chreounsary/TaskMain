<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->unsignedBigInteger('component_id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->foreign('action_id')
                    ->references('id')
                    ->on('actions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('component_id')
                    ->references('id')
                    ->on('components')
                    ->onDelete('cascade')
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
        Schema::dropIfExists('templates');
    }
}
