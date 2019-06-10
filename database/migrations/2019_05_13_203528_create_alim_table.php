<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'alim',
            function (Blueprint $table) {
                $table->unsignedBigInteger('alim_code')->primary();
                $table->text('alim_nom_fr', 255);
                $table->text('alim_nom_en', 255);
                $table->char('alim_grp_code', 2);
                $table->char('alim_ssgrp_code', 4);
                $table->char('alim_ssssgrp_code', 6);
                // $table->timestamps()->useCurrent();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );
                $table->foreign('alim_grp_code')
                    ->references('alim_grp_code')->on('alim_grp')
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
        Schema::dropIfExists('alim');
    }
}
