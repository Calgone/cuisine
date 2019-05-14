<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
                $table->unsignedTinyInteger('ordre');
                // $table->timestamps();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
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
