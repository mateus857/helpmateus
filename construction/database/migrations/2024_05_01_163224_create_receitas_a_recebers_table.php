<?php
// database/migrations/2024_05_01_162657_create_receitas_a_recebers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasARecebersTable extends Migration
{
    public function up()
    {
        Schema::create('receitas_a_recebers', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->decimal('valor', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receitas_a_recebers');
    }
}
