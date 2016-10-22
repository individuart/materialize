<?php namespace Individuart\Materialize\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCarouselsTable extends Migration
{
    public function up()
    {
        Schema::create('individuart_materialize_carousels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 250)->nullable();
            $table->boolean('published',false);
            $table->boolean('show_title',false);
            $table->boolean('show_description',false);
            $table->integer('sort_order');
            $table->integer('carousel_type')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_materialize_carousels');
    }
}