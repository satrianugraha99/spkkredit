<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nasabah_id');
            $table->foreign('nasabah_id')->references('id')->on('nasabah')->onDelete('cascade');
            $table->date('tanggal_pengajuan');
            $table->string('status_pengajuan');
            $table->string('status_peminjaman')->nullable();
            $table->date('tanggal_validasi')->nullable();
            $table->integer('total_nilai')->nullable();
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
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropForeign('pengajuan_nasabah_id_foreign');
            $table->dropColumn('nasabah_id');
        });
        Schema::dropIfExists('pengajuan');
    }
}
