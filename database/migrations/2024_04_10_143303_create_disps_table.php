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
        Schema::create('disps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_usr');
            $table->string('key');
            $table->string('model');
            $table->string('nick');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disps');
    }
};
