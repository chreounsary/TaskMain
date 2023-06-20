<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_temp_id');
            $table->string('name');
            $table->longText('code');
            $table->text('description');
            $table->timestamps();
            $table->foreign('action_temp_id')
                    ->references('id')
                    ->on('action_templates')
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
        Schema::dropIfExists('patials');
    }
}
