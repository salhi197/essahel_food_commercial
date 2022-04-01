<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('secteur')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('nom')->nullable();
            $table->string('telephone')->nullable();
            $table->string('n_registre')->nullable();
            $table->string('adresse')->nullable();
            $table->string('fax')->nullable();
            $table->string('nis')->nullable();
            $table->string('n_article')->nullable();
            $table->string('email')->nullable();
            $table->string('wilaya')->nullable();
            $table->string('nif')->nullable();
            $table->string('type')->nullable();            
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
        Schema::dropIfExists('clients');
    }
}
