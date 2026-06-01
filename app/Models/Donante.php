<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;

    protected $table = 'donantes';
    
    protected $fillable = [
    'ci', 'nombre', 'paterno', 'materno', 'fecha_nac', 
    'correo', 'password', 'celular', 'tipo_sangre', 'foto', 'fecha_reg', 
    'iduser', 'estado', 'ultima_donacion', 'total_donaciones',
    'departamento', 'municipio', 'zona', 'direccion'
];
}