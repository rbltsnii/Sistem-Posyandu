<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imunisasies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('balitas')->onDelete('cascade');
            $table->date('tgl_imunisasi');
            $table->string('jenis_imunisasi');
            $table->text('keterangan')->nullable();
            $table->foreignId('kader_id')->nullable()->constrained('users'); // Kader yang mencatat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imunisasies');
    }
};
