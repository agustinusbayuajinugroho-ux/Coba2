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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_type_id')
                ->constrained('book_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');
            // Synopsis diatur nullable atau text sesuai skema di halaman 16
            $table->text('synopsis')->nullable();
            $table->string('image');
            // HAPUS BARIS 'field list' DI SINI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};