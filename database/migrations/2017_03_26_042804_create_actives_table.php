<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_active_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->text('features');
            $table->string('unit');
            $table->float('stock');
            $table->integer('location_id')->unsigned();
            $table->text('note');
            $table->string('photo');
            $table->enum('state', ['Nuevo', 'Usado', 'Deteriorado', 'Defectuoso']);
            $table->foreign('category_active_id')->references('id')
                  ->on('categories_actives')->onDelete('cascade');
            $table->foreign('item_id')->references('id')
                  ->on('items')->onDelete('cascade');
            $table->foreign('location_id')->references('id')
                  ->on('locations')->onDelete('cascade');
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
        Schema::dropIfExists('actives');
    }
}
