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
        Schema::create('tbl_datos', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('telefono')->unique();
            $table->string('edad')->nullable();
            $table->string('comuna')->nullable();
            $table->string('cargo')->nullable();
            $table->timestamps();

            $table->foreign('user')->references('username')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_datos');
    }
};
