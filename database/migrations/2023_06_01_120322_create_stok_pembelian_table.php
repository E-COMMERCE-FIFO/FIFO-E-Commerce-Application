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
        Schema::create('stok_pembelian', function (Blueprint $table) {
            $table->string('kode_barang', 20)->primary();
            $table->unsignedInteger('id_detail_pembelian');
            $table->foreign('id_detail_pembelian')
            ->references('id_detail_pembelian')
            ->on('detail_pembelian')
            ->onDelete('cascade');
            $table->string('status_stok')->default('barang masuk');
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
        Schema::dropIfExists('stok_pembelian');
    }
};
