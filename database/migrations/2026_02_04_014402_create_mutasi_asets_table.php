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
        Schema::create('mutasi_asets', function (Blueprint $table) {
            $table->id();
            // aset_id
            $table->unsignedBigInteger('aset_id')->nullable();
            // from_location_id
            $table->unsignedBigInteger('from_location_id')->nullable();
            // to_location_id
            $table->unsignedBigInteger('to_location_id')->nullable();
            $table->date('tanggal_mutasi')->nullable();
            //keterangan
            $table->text('keterangan')->nullable();
            //user_id
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_asets');
    }
};
