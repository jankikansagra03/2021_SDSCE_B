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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->bigInteger('mobile')->nullable(false);
            $table->integer('age')->nullable(false);
            $table->string('gender', 7)->nullable(false);
            $table->string('hobbies', 100)->nullable(false);
            $table->string('qualification')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('pic')->default('default.png');
            $table->string('role')->default('normal');
            $table->string('status')->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
