<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->string('name');
            $table->longText('body')->nullable();
            $table->longText('form')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreign('task_id')
                    ->references('id')
                    ->on('tasks')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
        
        if (!Schema::hasColumn('components', 'task_id')) {
            Schema::table('components', function (Blueprint $table) {
                $table->unsignedBigInteger('task_id');
            } );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
