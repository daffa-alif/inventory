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
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang', 100);
        $table->string('jenis_barang', 100);
        $table->integer('stock', false, true)->length(5);
        $table->string('status', 20);
        $table->integer('harga_satuan', false, true)->length(10);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
