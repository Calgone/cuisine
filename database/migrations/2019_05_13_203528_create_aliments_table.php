<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'aliments',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id')->primary();
                $table->text('alim_nom_fr', 255);
                $table->text('alim_nom_en', 255);
                $table->char('alim_grp_code', 2);
                $table->char('alim_ssgrp_code', 4);
                $table->char('alim_ssssgrp_code', 6);
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
        Schema::dropIfExists('aliments');
    }
}
