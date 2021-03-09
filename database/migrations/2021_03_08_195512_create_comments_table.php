<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comments');
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->enum('status', ['APROVADO', 'DESAPROVADO']);
            $table->timestamps();


            $table->bigInteger('publication_id')->unsigned();
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');;
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('comments');
        Schema::enableForeignKeyConstraints();
    }
}
