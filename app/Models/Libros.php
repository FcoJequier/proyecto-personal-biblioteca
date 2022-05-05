<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    public function autores () {
        return $this->belongsTo('App\Models\Autores', 'idAutores');
    }

    public function categorias () {
        return $this->belongsTo('App\Models\Categorias', 'idCategorias');
    }

    public function editoriales () {
        return $this->belongsTo('App\Models\Editoriales', 'idEditoriales');
    }
}
