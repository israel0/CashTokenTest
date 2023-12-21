<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->double('netEarning');
            $table->string('rank');
            $table->integer('package');
            $table->integer('stage_id');
            $table->integer('noOfLevels');
            $table->integer('totalDownlines');
            $table->double('matrixBonus');
            $table->double('stageBonus');
            $table->double('stepoutBonus');
            $table->double('groupBonus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
