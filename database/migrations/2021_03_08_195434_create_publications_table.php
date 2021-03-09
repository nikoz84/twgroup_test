<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('publications');
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');;
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
        Schema::dropIfExists('publications');
        Schema::enableForeignKeyConstraints();
    }
}
