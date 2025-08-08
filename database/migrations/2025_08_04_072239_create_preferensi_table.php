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
        Schema::create('preferensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uraian');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('satker_id_1');
            $table->unsignedBigInteger('satker_id_2');
            $table->unsignedBigInteger('satker_id_3');
            $table->unsignedBigInteger('satker_id_4');
            $table->unsignedBigInteger('satker_id_5');

            $table->foreign('user_id')
                ->references('id') // user id
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('satker_id_1')
                ->references('id') // satker id
                ->on('satker')
                ->onDelete('cascade');
            $table->foreign('satker_id_2')
                ->references('id') // satker id
                ->on('satker')
                ->onDelete('cascade');
            $table->foreign('satker_id_3')
                ->references('id') // satker id
                ->on('satker')
                ->onDelete('cascade');
            $table->foreign('satker_id_4')
                ->references('id') // satker id
                ->on('satker')
                ->onDelete('cascade');
            $table->foreign('satker_id_5')
                ->references('id') // satker id
                ->on('satker')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensi');
    }
};
