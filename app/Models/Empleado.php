<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    protected $table ='empleado';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'status',
        'foto',
        'created_at',
        'updated_at'
    ]; 

    protected $casts =[
        'status'=>'boolean'
    ];
    public function getStatusIconAttribute()
    {
        return $this->status ? '✓' : '';
    }
    
    public function getStatusTextAttribute()
    {
        return $this->status ? 'Activo' : 'Inactivo';
    }
}