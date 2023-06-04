<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOaAlternativesTable extends Migration
{
    public function up()
    {
        Schema::create('oa_alternatives', function (Blueprint $table) {
            $table->id('id_alternative');
            $table->string('option', 5);
            $table->string('text', 700)->nullable();
            $table->tinyInteger('isCorrect')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oa_alternatives');
    }
}
