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
        Schema::create('stage_entrances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userName');
            $table->string('upline');
            $table->integer('type');            
            $table->integer('stage');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_entrances');
    }
};
