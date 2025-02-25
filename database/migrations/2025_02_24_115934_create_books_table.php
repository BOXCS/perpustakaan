<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Kolom ID (primary key, auto-increment)
            $table->string('nama'); // Kolom nama (tipe data VARCHAR)
            $table->decimal('harga', 10, 2); // Kolom harga (tipe data DECIMAL dengan 10 digit total dan 2 digit di belakang koma)
            $table->integer('stok'); // Kolom stok (tipe data INTEGER)
            $table->timestamps(); // Kolom created_at dan updated_at (otomatis diisi oleh Laravel)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books'); // Menghapus tabel books jika migration di-rollback
    }
};