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
        Schema::create('detalle_solicituds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idsolicitud');
            $table->unsignedBigInteger('idproducto');
            $table->integer('cantidad');
            $table->string('estadoentrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_solicituds');
    }
};
