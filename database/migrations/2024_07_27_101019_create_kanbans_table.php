<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKanbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanban.kanbans', function (Blueprint $table) {
            $table->id();
            $table->string('atividade')->nullable();
            $table->string('membros')->nullable();
            $table->string('prioridade')->nullable();
            $table->string('situacao')->nullable();
            $table->string('prazo')->nullable();
            $table->string('nota')->nullable();
            $table->string('cor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanban.kanbans');
    }
}
