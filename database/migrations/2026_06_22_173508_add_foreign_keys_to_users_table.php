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
        Schema::table('users', function (Blueprint $table) {

            // $table->foreign('agama_id')
            //     ->references('id')
            //     ->on('agamas')
            //     ->nullOnDelete();

            // $table->foreign('pendidikan_id')
            //     ->references('id')
            //     ->on('pendidikans')
            //     ->nullOnDelete();

            // $table->foreign('pekerjaan_id')
            //     ->references('id')
            //     ->on('pekerjaans')
            //     ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};