<?php

namespace Individuart\Materialize\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('individuart_materialize_cards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 250);
            $table->string('title', 250)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('link', 250)->nullable();
            $table->string('link_text', 250)->nullable();
            $table->boolean('published', false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_materialize_cards');
    }
}
