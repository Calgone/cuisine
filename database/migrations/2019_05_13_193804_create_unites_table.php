<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'unites',
            function (Blueprint $table) {
                $table->unsignedTinyInteger('id')->primary();
                $table->string('categorie', 20)->index();
                $table->char('origine', 2);
                $table->string('nom', 100);
                $table->string('nom_court', 10);
                // $table->timestamps();
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
        Schema::dropIfExists('unites');
    }
}
