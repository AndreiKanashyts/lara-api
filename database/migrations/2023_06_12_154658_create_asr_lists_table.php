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
        Schema::create('asr_lists', function (Blueprint $table) {
            $table->id();
            $table->uuid('_CommutationId');
            $table->integer('_DirectionCommutationId');
            $table->integer('_SourceCommutationId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asr_lists');
    }
};
