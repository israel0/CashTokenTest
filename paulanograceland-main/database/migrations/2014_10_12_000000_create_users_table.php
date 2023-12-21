<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("id");
            $table->primary("id");
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->string('dateOfBirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phoneNumber');
            $table->string('userName', 20)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('transactionPassword');
            $table->string('bankName')->nullable();
            $table->string('bankAccountName')->nullable();
            $table->string('bankAccountNumber')->nullable();
            $table->string('pageUrl')->nullable();
            $table->string('photoUrl')->nullable();
            $table->integer('stage')->default(0);
            $table->string('upline');
            $table->string('sponsorName');
            $table->integer('package')->default(1);
            $table->timestamp('userEntranceDate')->nullable();
            $table->timestamp('stageOneDate')->nullable();
            $table->timestamp('stageTwoDate')->nullable();
            $table->timestamp('stageThreeDate')->nullable();
            $table->timestamp('stageFourDate')->nullable();
            $table->timestamp('stageFiveDate')->nullable();
            $table->timestamp('currentStageDate')->nullable();            
            $table->integer('status')->default(User::$USER_PENDING);
            $table->boolean('suspended')->default(false);
            $table->string('payment_method')->nullable();
            $table->string('payment_proof')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
