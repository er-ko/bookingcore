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
        Schema::create('timezones', function (Blueprint $table) {
            $table->id();

            $table->string('name', 64)->unique();
            $table->string('display_name', 128)->nullable();
            $table->string('region', 32)->index();
            $table->string('city', 64)->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->integer('sort_order')->default(0);

            $table->timestamps();

            $table->index(['region', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timezones');
    }
};