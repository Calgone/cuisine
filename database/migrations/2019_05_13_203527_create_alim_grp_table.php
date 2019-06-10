<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimGrpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'alim_grp',
            function (Blueprint $table) {
                $table->bigIncrements('id'); // Le Ciqual utilise une clé sur 3 champs
                $table->char('alim_grp_code', 2);
                $table->char('alim_ssgrp_code', 4);
                $table->char('alim_ssssgrp_code', 6);
                $table->char('alim_grp_nom_fr', 255);
                $table->char('alim_grp_nom_eng', 255);
                $table->char('alim_ssgrp_nom_fr', 255);
                $table->char('alim_ssgrp_nom_eng', 255);
                $table->char('alim_ssssgrp_nom_fr', 255);
                $table->char('alim_ssssgrp_nom_eng', 255);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
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
        Schema::dropIfExists('alim_grp');
    }
}
