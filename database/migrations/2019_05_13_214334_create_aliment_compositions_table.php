<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentCompositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'aliment_compositions',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('alim_id');
                $table->unsignedBigInteger('const_id');
                $table->text('teneur', 20);
                $table->text('min', 20);
                $table->text('max', 20);
                $table->text('code_confiance', 1);
                $table->unsignedBigInteger('source_code');
                $table->timestamps();
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
        Schema::dropIfExists('aliment_compositions');
    }
}
