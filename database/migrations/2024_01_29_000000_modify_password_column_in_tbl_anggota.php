<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbl_anggota', function (Blueprint $table) {
            $table->string('password', 255)->change(); // Mengubah panjang kolom password menjadi 255
        });
    }

    public function down()
    {
        Schema::table('tbl_anggota', function (Blueprint $table) {
            $table->string('password', 50)->change(); // Mengembalikan ke panjang semula
        });
    }
}; 