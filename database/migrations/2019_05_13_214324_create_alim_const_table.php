<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimConstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'alim_const',
            function (Blueprint $table) {
                $table->unsignedBigInteger('const_code')->primary();
                $table->text('const_nom_fr', 80);
                $table->text('const_nom_en', 80);
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
        Schema::dropIfExists('alim_const');
    }
}
