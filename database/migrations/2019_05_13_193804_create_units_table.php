<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'units',
            function (Blueprint $table) {
                $table->unsignedTinyInteger('id')->primary();
                $table->string('category', 20)->index();
                $table->char('origin', 2);
                $table->string('name', 100);
                $table->string('short_name', 10);
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
        Schema::dropIfExists('units');
    }
}
