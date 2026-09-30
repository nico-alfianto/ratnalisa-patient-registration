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
        Schema::create('pembayarans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pemeriksaan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('kode_pembayaran');

            $table->integer('total_bayar');

            $table->string('metode_pembayaran')->nullable();

            $table->string('midtrans_order_id')->nullable();

            $table->enum('status', [
                'Menunggu Pembayaran',
                'Selesai',
            ])->default('Menunggu Pembayaran');

            $table->timestamp('expired_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
