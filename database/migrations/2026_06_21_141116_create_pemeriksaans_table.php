<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('layanan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('no_registrasi')->unique();

            $table->text('alamat');

            $table->string('kelurahan');

            $table->string('kota');

            $table->string('negara')->default('Indonesia');

            $table->text('catatan')->nullable();

            $table->enum('status', [

                'Menunggu Pembayaran',
                'Selesai'

            ])->default('Menunggu Pembayaran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
