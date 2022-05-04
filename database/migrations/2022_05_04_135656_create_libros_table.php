<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('titulo');

            $table->bigInteger('idAutores')->unsigned();
            $table->bigInteger('idCategorias')->unsigned();
            $table->bigInteger('idEditoriales')->unsigned();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idAutores')->references('id')->on('autores')->onDelete("cascade");
            $table->foreign('idCategorias')->references('id')->on('categorias')->onDelete("cascade");
            $table->foreign('idEditoriales')->references('id')->on('editoriales')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
