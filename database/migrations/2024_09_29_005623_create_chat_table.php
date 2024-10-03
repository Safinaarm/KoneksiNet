<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable(); // Kolom untuk menyimpan pesan teks
            $table->string('image')->nullable(); // Kolom untuk menyimpan path gambar
            $table->string('document')->nullable(); // Kolom untuk menyimpan path dokumen
            $table->string('email'); // Kolom untuk menyimpan alamat email yang akan dikirim
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
};
