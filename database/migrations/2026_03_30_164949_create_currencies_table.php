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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();

            $table->char('currency_code', 3);

            $table->string('name', 128);
            $table->string('local_name', 128);

            $table->string('flag_emoji', 16)->nullable();

            $table->unsignedTinyInteger('minor_unit')->default(2);

            $table->string('symbol_prefix', 16)->nullable();
            $table->string('symbol_suffix', 16)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique('currency_code');

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
        Schema::dropIfExists('currencies');
    }
};