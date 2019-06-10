<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimCompoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'alim_compo',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('alim_code');
                $table->unsignedBigInteger('const_code');
                $table->text('teneur', 20);
                $table->text('min', 20);
                $table->text('max', 20);
                $table->text('code_confiance', 1);
                $table->unsignedBigInteger('source_code');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

                $table->foreign('alim_code')
                    ->references('alim_code')->on('alim')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                
                $table->foreign('const_code')
                    ->references('const_code')->on('alim_const')
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
        Schema::dropIfExists('alim_compo');
    }
}
