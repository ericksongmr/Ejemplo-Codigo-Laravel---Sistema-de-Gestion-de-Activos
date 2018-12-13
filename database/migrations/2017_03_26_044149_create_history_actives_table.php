<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_actives', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['Entrada', 'Salida']);
            $table->integer('active_id')->unsigned();
            $table->float('amount');
            $table->string('responsible');
            $table->date('date');
            $table->text('note');
            $table->foreign('active_id')->references('id')
                  ->on('actives')->onDelete('cascade');
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
        Schema::dropIfExists('history_actives');
    }
}
