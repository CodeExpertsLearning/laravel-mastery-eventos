<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            //user_id (conter a chave estrangeira) && a chave estrangeira ela têm um padrão: profiles_user_id_foreign
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->text('about')->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('social_networks')->nullable();

            $table->timestamps();

            //Definindo chave estrangeira anteriormente ao laravel 7
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
