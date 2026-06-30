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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('public_id', 32);

            // Core identity
            $table->string('name', 255);
            $table->text('description')->nullable();

            // Classification
            $table->string('rental_type', 32);   // short_term | long_term
            $table->string('property_type', 32);  // apartment | house | room | garage | garden | parking | other

            // Location
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode', 32)->nullable();
            $table->char('country_code', 2)->nullable();
            $table->string('timezone', 64)->default('UTC');

            // Capacity & size
            $table->unsignedSmallInteger('max_guests')->nullable();
            $table->unsignedSmallInteger('size_sqm')->nullable();

            // Short-term fields
            $table->decimal('price_per_night', 10, 2)->nullable();
            $table->unsignedTinyInteger('min_nights')->default(1);
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->decimal('cleaning_fee', 10, 2)->nullable();

            // Long-term fields
            $table->decimal('price_per_month', 10, 2)->nullable();
            $table->unsignedTinyInteger('min_months')->default(1);
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->date('available_from')->nullable();
            $table->boolean('utilities_included')->default(false);

            // Visibility
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique('public_id');
            $table->index(['user_id', 'is_active']);
            $table->index(['user_id', 'rental_type']);
            $table->index('country_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
