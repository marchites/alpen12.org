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
        Schema::create('voting_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained()->cascadeOnDelete();
            $table->string('token')->unique();
            $table->timestamp('used_at')->nullable();
            $table->timestamps();
            $table->unique('alumni_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_tokens');
    }
};
