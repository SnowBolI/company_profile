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
        Schema::create('pesan_tabungans', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->string('status');
            $table->string('subjek');
            $table->bigInteger('ktp');
            $table->text('alamat');
            $table->string('hp');
            $table->string('email');
            $table->string('tipe_tabungan');
            $table->bigInteger('setoran_awal');
            $table->date('tanggal');
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
        Schema::dropIfExists('pesan_tabungans');
    }
};
