<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('learn_id');
            $table->unsignedBigInteger('question_id');

            $table->foreign('learn_id')->references('id_learn')->on('oa_learn')->onDelete('no action')->onUpdate('no action');
            $table->foreign('question_id')->references('id_question')->on('oa_questions')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learn_questions');
    }
}
