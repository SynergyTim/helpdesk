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
        Schema::create('reporting', function (Blueprint $table) {
            $table->id();
            $table->string('reporter');
            $table->string('division');
            $table->string('phone_number');
            $table->string('complaint');
            $table->string('photo')->nullable();
            $table->string('handling')->nullable();
            $table->string('officer')->nullable();
            $table->enum('status', ['open', 'close'])->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporting');
    }
};
