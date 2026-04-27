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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();

            $table->string('language_tag', 16);
            $table->char('iso_alpha3', 3)->nullable();

            $table->string('name', 64);
            $table->string('local_name', 64);

            $table->string('flag_emoji', 16)->nullable();
            $table->string('flag_icon', 64)->nullable();

            $table->string('date_format', 32);
            $table->string('time_format', 32);
            $table->string('datetime_format', 32);

            $table->enum('hour_cycle', ['12', '24'])->default('24');

            $table->string('decimal_separator', 4)->default('.');
            $table->string('thousands_separator', 8)->default(',');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique('language_tag');
            $table->unique('iso_alpha3');

            $table->index('name');
            $table->index('local_name');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};