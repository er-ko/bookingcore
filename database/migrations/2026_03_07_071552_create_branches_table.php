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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('public_id', 32);

            $table->string('name', 255);
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode', 32)->nullable();
            $table->char('country_code', 2)->nullable();
            $table->string('timezone', 64)->default('UTC');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['user_id', 'is_active']);
            $table->index('country_code');
            $table->index('timezone');

            $table->unique('public_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};