<?php

namespace Individuart\Materialize\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateCollapsibleItemsTable extends Migration
{
    public function up()
    {
        Schema::create('individuart_materialize_collapsible_items', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 250);
            $table->string('title', 250)->nullable();
            $table->string('description', 250)->nullable();
            $table->boolean('published', false);
            $table->integer('sort_order');
            $table->integer('collapsible_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_materialize_collapsible_items');
    }
}
