<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('approved')->default(0)->nullable();
            $table->integer('role')->default(0);
            $table->string('industry')->nullable();
            $table->string('region')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('website')->nullable();
            $table->string('products_offered')->nullable();
            $table->integer('no_employees')->nullable();
            $table->string('registration_form')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->timestamp('date_approved')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('corporate_users');
    }
}
