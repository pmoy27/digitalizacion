<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'id_propietario'
        // Otros campos si los hay
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'id_propietario', 'id');
    }
}
