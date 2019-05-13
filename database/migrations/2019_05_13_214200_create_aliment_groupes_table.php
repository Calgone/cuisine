<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'aliment_groupes',
            function (Blueprint $table) {
                $table->bigIncrements('id'); // A voir le Ciqual utilise une clé des groupes sur 3 champs
                $table->char('alim_grp_code', 2);
                $table->char('alim_ssgrp_code', 4);
                $table->char('alim_ssssgrp_code', 6);
                $table->char('alim_grp_nom_fr', 255);
                $table->char('alim_grp_nom_eng', 255);
                $table->char('alim_ssgrp_nom_fr', 255);
                $table->char('alim_ssgrp_nom_eng', 255);
                $table->char('alim_ssssgrp_nom_fr', 255);
                $table->char('alim_ssssgrp_nom_eng', 255);
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
        Schema::dropIfExists('aliment_groupes');
    }
}
