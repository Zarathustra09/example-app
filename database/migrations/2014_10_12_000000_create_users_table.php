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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('approved')->default(0)->nullable();
            $table->integer('role')->default(0);

            // Add gender field
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            
            //images
            $table->string('registration_form')->nullable();
            $table->string('proof_of_payment')->nullable();

            $table->timestamp('date_approved')->nullable();
    
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
