<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audio_id')->constrained('audio');
            $table->string('tag_name');
            $table->string('hour');
            $table->string('minute');
            $table->string('second');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_tags');
    }
}
