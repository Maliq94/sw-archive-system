<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->foreignId('scholar_id')->constrained('scholars');
            $table->foreignId('fn_id')->constrained('fn');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('program_id')->constrained('programs');
            $table->string('file');
            $table->string('episode')->nullable();
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
        Schema::dropIfExists('audio');
    }
}
