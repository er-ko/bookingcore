<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_timezone', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('timezone_id');

            $table->primary(['country_id', 'timezone_id'], 'pk_country_timezone');
            $table->index('timezone_id', 'idx_country_timezone_timezone_id');

            $table->foreign('country_id', 'fk_country_timezone_country')
                ->references('id')
                ->on('countries')
                ->cascadeOnDelete();

            $table->foreign('timezone_id', 'fk_country_timezone_timezone')
                ->references('id')
                ->on('timezones')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_timezone');
    }
};