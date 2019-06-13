<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ingredients',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('recipe_id');
                $table->timestamps();

                $table->foreign('ingredient_group_id')
                    ->references('id')->on('ingredient_groups')
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
        Schema::dropIfExists('ingredients');
    }
}
