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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('nominal');
            $table->string('period');
            $table->foreignId('dues_categories_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('petugas');
            $table->string('jumlah_tagihan');
            $table->integer('nominal_tagihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
