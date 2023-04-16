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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->increments('id_detail_pembelian');
            $table->foreignId('id_pembelian')->constrained('pembelian');
            $table->foreignId('id_barang')->constrained('barang');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
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
        Schema::dropIfExists('detail_pembelian');
    }
};