<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'recipes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('owner_id');
                $table->string('title', 200);
                $table->text('description');
                $table->unsignedTinyInteger('nb_people');
                $table->unsignedSmallInteger('prep_minutes');
                $table->unsignedSmallInteger('cook_minutes');
                $table->unsignedSmallInteger('rest_minutes');
                $table->unsignedDecimal('cost', 8, 2);
                $table->unsignedTinyInteger('difficulty');
                $table->string('img_path', 255);
                // $table->timestamps();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->default(
                    DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                );

                $table->foreign('owner_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('recipes');
    }
}
