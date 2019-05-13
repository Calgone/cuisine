<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'recettes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('owner_id');
                $table->string('nom');
                $table->text('description');
                $table->unsignedTinyInteger('nb_personnes');
                $table->unsignedSmallInteger('prepa_minutes');
                $table->unsignedSmallInteger('cuisson_minutes');
                $table->unsignedSmallInteger('repos_minutes');
                $table->unsignedDecimal('cout', 8, 2);
                $table->unsignedTinyInteger('difficulte');
                $table->timestamps();

                $table->foreign('owner_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('recettes');
    }
}
