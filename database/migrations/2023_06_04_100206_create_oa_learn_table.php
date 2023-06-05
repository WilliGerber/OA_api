<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOaLearnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oa_learn', function (Blueprint $table) {
            $table->id('id_learn');
            $table->string('title', 200);
            $table->string('tag', 45);
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('subject_id');
            $table->longText('text');
            $table->timestamps();

            $table->foreign('level_id')->references('id_level')->on('oa_level')->onDelete('no action')->onUpdate('no action');
            $table->foreign('subject_id')->references('id_subject')->on('oa_subjects')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_learn');
    }
}
