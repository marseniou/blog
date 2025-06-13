<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->json('name')->required();
            $table->json('position')->required();
            $table->json('excerpt')->required();
            $table->json('content')->required();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->json('university')->nullable();
            $table->string('weight')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
