<?php namespace Individuart\Materialize\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSliderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('individuart_materialize_slider_items', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 250);
            $table->string('title', 250)->nullable();
            $table->string('description', 250)->nullable();
            $table->boolean('published', false);
            $table->integer('sort_order');
            $table->string('link', 255)->nullable;
            $table->integer('slider_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_materialize_slider_items');
    }
}