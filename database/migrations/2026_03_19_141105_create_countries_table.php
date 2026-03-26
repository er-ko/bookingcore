<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->char('iso_numeric', 3);
            $table->char('iso_alpha2', 2);
            $table->char('iso_alpha3', 3);

            $table->string('name', 128);
            $table->string('official_name', 191)->nullable();
            $table->string('local_name', 191)->nullable();

            $table->string('flag_emoji', 16)->nullable();

            $table->char('default_language_code', 2)->nullable();
            $table->char('default_currency_code', 3)->nullable();
            $table->string('phone_code', 8)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique('iso_numeric');
            $table->unique('iso_alpha2');
            $table->unique('iso_alpha3');

            $table->index('name');
            $table->index('is_active');
            $table->index('default_currency_code');
            $table->index('default_language_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};