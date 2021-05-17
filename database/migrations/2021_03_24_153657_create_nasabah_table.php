<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->char('noKtp', 16)->unique();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->char('noTelp', 13)->nullable();
            $table->string('jenisKelamin')->nullable();
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
        Schema::table('nasabah', function (Blueprint $table) {
            $table->dropForeign('nasabah_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('nasabah');
    }
}
