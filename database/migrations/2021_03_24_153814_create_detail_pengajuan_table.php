<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('nasabah_id');
            // $table->foreign('nasabah_id')->references('id')->on('nasabah')->onDelete('cascade');
            $table->unsignedBigInteger('pengajuan_id');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade');
            $table->unsignedBigInteger('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->integer('nilai');
            $table->string('ket_nilai');
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
        Schema::table('detail_pengajuan', function (Blueprint $table) {
            // $table->dropForeign('detail_pengajuan_nasabah_id_foreign');
            // $table->dropColumn('nasabah_id');
            $table->dropForeign('detail_pengajuan_pengajuan_id_foreign');
            $table->dropColumn('pengajuan_id');
            $table->dropForeign('detail_pengajuan_kriteria_id_foreign');
            $table->dropColumn('kriteria_id');
        });
        Schema::dropIfExists('detail_pengajuan');
    }
}
