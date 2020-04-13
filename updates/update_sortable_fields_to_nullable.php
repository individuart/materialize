<?php

namespace Individuart\Materialize\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class UpdateSortableFieldsToNullable extends Migration
{
    public function up()
    {
        Schema::table('individuart_materialize_carousels', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_materialize_carousel_items', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_materialize_collapsibles', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_materialize_collapsible_items', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_materialize_sliders', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_materialize_slider_items', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('individuart_materialize_carousels', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_materialize_carousel_items', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_materialize_collapsibles', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_materialize_collapsible_items', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_materialize_sliders', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_materialize_slider_items', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
    }
}
