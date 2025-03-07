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
    // Migration
public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->integer('kategori_id');
        $table->date('tanggal');
        $table->string('judul');
        $table->text('isi');
        $table->tinyInteger('status')->default(1);
        $table->timestamps();
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