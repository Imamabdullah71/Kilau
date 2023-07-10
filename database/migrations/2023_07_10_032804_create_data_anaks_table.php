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
        Schema::create('dataAnak', function (Blueprint $table) {
            $table->string('nama');
            $table->string('gender');
            $table->string('agama');
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->integer('anakKe');
            $table->integer('dariBersudara');
            $table->string('statusCPB');
        });
    }

    /*
    * Nama
	* Jenis Kelamin <option>
	* Agama <option>
	* Tempat Lahir
	* Tanggal Lahir
	* Anak ke
	* Dari Bersaudara
    * Status CPB <option>
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataAnak');
    }
};
