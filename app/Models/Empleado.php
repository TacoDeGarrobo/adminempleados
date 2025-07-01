<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'correo',
        'edad',
        'puesto',
        'departamento_id',
    ];

    public function Departamento()
    {
        return $this->
        belongsTo(Departamento::class);
        }
}
