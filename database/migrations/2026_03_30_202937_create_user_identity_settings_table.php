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
        Schema::create('user_identity_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('mode', 32)->default('services')->index();

            $table->string('brand_name', 160);
            $table->string('slug', 120)->unique();

            $table->string('default_language_code', 16)->nullable();
            $table->char('default_currency_code', 3)->nullable();
            $table->char('default_country_code', 2)->nullable();

            $table->boolean('is_public')->default(true)->index();

            $table->timestamps();

            $table->index('default_language_code');
            $table->index('default_currency_code');
            $table->index('default_country_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_identity_settings');
    }
};