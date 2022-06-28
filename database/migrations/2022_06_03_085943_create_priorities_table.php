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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->constrained();
            $table->foreignId('round_id')->nullable(true)->constrained();
            $table->integer('priority')->nullable(true)->default(0);
            $table->integer('available_weeks')->nullable(true);
            $table->integer('available_properties')->nullable(false);
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
        Schema::dropIfExists('priorities');
    }
};
