<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('libros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('idLibros');
            $table->string('titulo');

            $table->bigInteger('idAutores')->unsigned();
            $table->bigInteger('idCategorias')->unsigned();
            $table->bigInteger('idEditoriales')->unsigned();

            $table->timestamps();

            $table->foreign('idAutores')->references('idAutores')->on('autores')->onDelete("cascade");
            $table->foreign('idCategorias')->references('idCategorias')->on('categorias')->onDelete("cascade");
            $table->foreign('idEditoriales')->references('idEditoriales')->on('editoriales')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
