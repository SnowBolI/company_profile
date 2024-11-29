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
        Schema::create('pesan_kredits', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->string('status');
            $table->string('subjek');
            $table->bigInteger('ktp');
            $table->text('alamat');
            $table->string('hp');
            $table->string('email');
            $table->bigInteger('jumlah_pinjaman');
            $table->integer('waktu_pinjaman');
            $table->text('tujuan_pinjaman');
            $table->text('jaminan');

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
        Schema::dropIfExists('pesan_kredits');
    }
};
