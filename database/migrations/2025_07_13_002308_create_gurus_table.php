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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('nama');
            $table->string('nip');
            $table->bigInteger('mapel_id')->unsigned();
            $table->string('no_telp');
            $table->string('alamat');
            $table->timestamps();
            
             // Relation tabels
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
