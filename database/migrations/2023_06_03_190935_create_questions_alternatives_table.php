<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsAlternativesTable extends Migration
{
    public function up()
    {
        Schema::create('questions_alternatives', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('alternative_id');
            $table->index('question_id');
            $table->index('alternative_id');
            $table->foreign('question_id')->references('id_question')->on('oa_questions')->onDelete('no action')->onUpdate('no action');
            $table->foreign('alternative_id')->references('id_alternative')->on('oa_alternatives')->onDelete('no action')->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions_alternatives');
    }
}
