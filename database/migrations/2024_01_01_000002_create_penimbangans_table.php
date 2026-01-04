<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penimbangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('balitas')->onDelete('cascade');
            $table->date('tgl_penimbangan');
            $table->float('berat_badan'); // kg
            $table->float('tinggi_badan'); // cm
            $table->float('lingkar_kepala')->nullable(); // cm
            $table->text('keterangan')->nullable();
            $table->foreignId('kader_id')->nullable()->constrained('users'); // Kader yang mencatat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penimbangans');
    }
};
