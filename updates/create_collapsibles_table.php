<?php

namespace Individuart\Materialize\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateCollapsiblesTable extends Migration
{
    public function up()
    {
        Schema::create('individuart_materialize_collapsibles', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 250)->nullable();
            $table->boolean('published', false);
            $table->integer('sort_order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_materialize_collapsibles');
    }
}
