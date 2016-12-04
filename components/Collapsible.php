<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Individuart\Materialize\Models\Collapsible as CollapsibleClass;
use Individuart\Materialize\Models\Color;

class Collapsible extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => Lang::get('individuart.materialize::lang.backend.collapsible'),
            'description' => Lang::get('individuart.materialize::lang.backend.collapsible_component_description')
        ];
    }

    public function defineProperties()
    {
        return [
            'collapsible' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.collapsible'),
                'type'              => 'dropdown',
                'placeholder'       => ''
            ],
            'popout' => [
                'title'             => 'popout',
                'type'              => 'checkbox'
            ],
            'type' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.type'),
                'type'              => 'dropdown'
            ],
            'itemsfontcolor' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.font_color'),
                'type'              => 'dropdown',
                'default'           => '',
            ],
            'itemsfontcolorvar' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.font_color_variant'),
                'type'              => 'dropdown',
                'default'       => ''
            ],
            'itemsbgfontcolor' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.font_background_color'),
                'type'              => 'dropdown',
                'default'           => '',
            ],
            'itemsbgfontcolorvar' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.font_background_color_variant'),
                'type'              => 'dropdown',
                'default'       => ''
            ]

        ];
    }

    public function getCollapsibleOptions()
    {
        $collapsibles = CollapsibleClass::published()->orderBy('sort_order','asc')->get();
        $arr_collapsibles = array();
        if($collapsibles)
        {
            foreach($collapsibles as $collapsible)
            {
                $arr_collapsibles[$collapsible->id] = $collapsible->name;
            }
            return $arr_collapsibles;
        }else{
            return [];
        }

    }

    public function getColors()
    {
        $colors = new Color();
        return $colors->colors;
    }

    public function getColorVariants()
    {
        $colors = new Color();
        return $colors->color_variants;
    }

    public function getTypeOptions()
    {
        return ['accordion'=>Lang::get('individuart.materialize::lang.backend.accordion'),'expandable'=>Lang::get('individuart.materialize::lang.backend.expandable')];
    }

    public function getItemsfontcolorOptions()
    {
        return $this->getColors();
    }
    public function getItemsfontcolorvarOptions()
    {
        return $this->getColorVariants();
    }
    public function getItemsbgfontcolorOptions()
    {
        return $this->getColors();
    }
    public function getItemsbgfontcolorvarOptions()
    {
        return $this->getColorVariants();
    }





    public function onRun()
    {
        $this->addJs('components/collapsible/assets/js/default.js');

    }


    public function collapsible_items()
    {
        $collapsible_id = $this->property('collapsible');
        $collapsible_items = CollapsibleClass::find($collapsible_id)->collapsible_items;
        return $collapsible_items;
    }

    public function popout(){
        return $this->property('popout');
    }

    public function type(){
        return $this->property('type');
    }

    public function itemsfontcolor(){
        return $this->property('itemsfontcolor');
    }
    public function itemsfontcolorvar(){
        return $this->property('itemsfontcolorvar');
    }

    public function itemsbgfontcolor(){
        return $this->property('itemsbgfontcolor');
    }
    public function itemsbgfontcolorvar(){
        return $this->property('itemsbgfontcolorvar');
    }



}