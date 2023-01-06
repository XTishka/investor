<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->constrained();
            $table->foreignId('round_id')->nullable(false)->constrained();
            $table->foreignId('property_id')->nullable(false)->constrained();
            $table->integer('week_code')->nullable(false);
            $table->enum('status', ['confirmed', 'waiting', 'failed'])->default('waiting');
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
        Schema::dropIfExists('wishes');
    }
};
