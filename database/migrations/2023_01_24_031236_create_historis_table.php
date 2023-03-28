<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lelang')->constrained('lelangs');
            $table->foreignId('id_barang')->constrained('barangs');
            $table->foreignId('id_user')->constrained('users');
            $table->integer('tawar_harga');
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
        Schema::dropIfExists('historis');
    }
};
