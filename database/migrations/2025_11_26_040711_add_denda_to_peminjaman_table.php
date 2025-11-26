<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            $table->decimal('denda', 10, 2)->default(0)->after('jumlah');
        });
    }

    public function down()
    {
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            $table->dropColumn('denda');
        });
    }
};
