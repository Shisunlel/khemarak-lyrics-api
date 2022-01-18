<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained();
            $table->foreignId('album_id')->nullable()->constrained();
            $table->string('title');
            $table->integer('length')->nullable()->comment('duration in ms');
            $table->integer('track')->nullable()->comment('track no in album');
            $table->integer('disc')->nullable()->comment('if there are more than one disc');
            $table->text('lyrics');
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
        Schema::dropIfExists('songs');
    }
}
