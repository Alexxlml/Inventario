<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 30);
            $table->string('descripcion', 100);

            $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('sucursal_id')
            ->constrained('sucursales')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('estado_id')
            ->constrained('estados')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('precio');
            $table->date('fecha_compra');
            $table->date('fecha_modificacion');

            $table->string('comentarios', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
