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
        Schema::create('kantor_kas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->text('alamat');
            $table->text('gmap');
            $table->string('telepon');
            $table->string('gambar');
            $table->foreignId('kantor_cabang_id')->nullable();
            $table->foreign('kantor_cabang_id')->references('id')->on('kantor_cabangs')->onDelete('cascade');
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
        Schema::dropIfExists('kantor_kas');
    }
};
