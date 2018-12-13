<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proyect');
            $table->integer('job_id')->unsigned();
            $table->date('date');
            $table->string('place');
            $table->string('responsible');
            $table->text('note');
            $table->enum('state', ['Iniciado', 'Culminado', 'Cancelado']);
            $table->foreign('job_id')->references('id')
                  ->on('jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputs');
    }
}
