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
            'steps',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('recipe_id');
                $table->text('description');
                $table->unsignedTinyInteger('order');
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
                $table->foreign('recipe_id')
                    ->references('id')->on('recipes')
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
        Schema::dropIfExists('steps');
    }
}
