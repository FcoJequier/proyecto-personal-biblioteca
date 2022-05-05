<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;

    public function libros()
    {
        return $this->hasMany('App\Models\Libros', 'idAutores', 'id');
    }
}
