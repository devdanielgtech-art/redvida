<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donantes', function (Blueprint $table) {
            $table->id('id');
            $table->string('ci', 15)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('paterno', 50)->nullable();
            $table->string('materno', 50)->nullable();
            $table->date('fecha_nac');
            $table->string('correo', 250)->nullable();
            $table->integer('celular')->unsigned();
            $table->enum('tipo_sangre', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->default('O+');
            $table->string('foto', 200)->nullable();
            $table->enum('departamento', ['LA PAZ', 'ORURO', 'POTOSI', 'COCHABAMBA', 'SANTA CRUZ', 'BENI', 'PANDO', 'CHUQUISACA', 'TARIJA'])->default('LA PAZ');
            $table->string('municipio', 100)->nullable();
            $table->string('zona', 100)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->date('fecha_reg')->nullable();
            $table->integer('iduser')->unsigned();
            $table->enum('estado', ['ACTIVO', 'ELIMINADO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};