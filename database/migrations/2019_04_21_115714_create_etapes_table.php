<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'etapes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('recette_id');
                $table->text('description');
                $table->boolean('complete')->default(false);
                $table->unsignedTinyInteger('ordre');
                $table->timestamps();
            }
        );

        Schema::table(
            'etapes',
            function (Blueprint $table) {
                $table->foreign('recette_id')
                    ->references('id')->on('recettes')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
}
