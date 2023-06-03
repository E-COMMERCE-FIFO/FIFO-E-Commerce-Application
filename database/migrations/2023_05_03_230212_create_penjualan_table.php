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
    Schema::create('penjualan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users');
        $table->date('tanggal_penjualan');
        $table->integer('harga');
        $table->integer('qty');
        $table->integer('jumlah_bayar');
        $table->foreignId('id_barang')->constrained('barang');
        $table->string('bukti_pembayaran')->nullable();
        $table->string('keterangan')->nullable();
        $table->string('status')->default('Menunggu Pembayaran');
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
        Schema::dropIfExists('penjualan');
    }
};
