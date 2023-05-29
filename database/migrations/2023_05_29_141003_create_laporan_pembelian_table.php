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
        Schema::create('laporan_pembelian', function (Blueprint $table) {
            $table->increments('id_laporan_pembelian');
            $table->foreignId('id_pembelian')->constrained('pembelian');
            $table->foreignId('id_barang')->constrained('barang');
            $table->integer('jumlah_pembelian');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('jumlah_harga');
            $table->foreignId('id_supplier')->constrained('supplier');
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
        Schema::dropIfExists('laporan_pembelian');
    }
};
