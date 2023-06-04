<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOaQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('oa_questions', function (Blueprint $table) {
            $table->id('id_question');
            $table->string('title', 200);
            $table->string('tag', 45);
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('subject_id');
            $table->tinyInteger('isForm')->nullable();
            $table->string('question', 2000)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oa_questions');
    }
}
