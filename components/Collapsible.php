<?php

namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Individuart\Materialize\Models\Collapsible as CollapsibleClass;
use Individuart\Materialize\Models\Color;

class Collapsible extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => Lang::get('individuart.materialize::lang.backend.collapsible'),
            'description' => Lang::get('individuart.materialize::lang.backend.collapsible_component_description'),
        ];
    }

    public function defineProperties()
    {
        return [
            'collapsible' => [
                'title' => Lang::get('individuart.materialize::lang.backend.collapsible'),
                'type' => 'dropdown',
                'placeholder' => '',
            ],
            'popout' => [
                'title' => 'popout',
                'type' => 'checkbox',
            ],
            'type' => [
                'title' => Lang::get('individuart.materialize::lang.backend.type'),
                'type' => 'dropdown',
            ],

            'titlefontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'titlefontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_color_variant'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'titlebgfontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_background_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'titlebgfontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_background_color_variant'),
                'type' => 'dropdown',
                'default' => '',
            ],

            'itemsfontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.font_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'itemsfontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.font_color_variant'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'itemsbgfontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.font_background_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'itemsbgfontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.font_background_color_variant'),
                'type' => 'dropdown',
                'default' => '',
            ],

        ];
    }

    public function getCollapsibleOptions()
    {
        $collapsibles = CollapsibleClass::published()->orderBy('sort_order', 'asc')->get();
        $arr_collapsibles = [];
        if ($collapsibles) {
            foreach ($collapsibles as $collapsible) {
                $arr_collapsibles[$collapsible->id] = $collapsible->name;
            }

            return $arr_collapsibles;
        }

        return [];
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
        return ['accordion' => Lang::get('individuart.materialize::lang.backend.accordion'), 'expandable' => Lang::get('individuart.materialize::lang.backend.expandable')];
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

    public function getTitlefontcolorOptions()
    {
        return $this->getColors();
    }

    public function getTitlefontcolorvarOptions()
    {
        return $this->getColorVariants();
    }

    public function getTitlebgfontcolorOptions()
    {
        return $this->getColors();
    }

    public function getTitlebgfontcolorvarOptions()
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

        return CollapsibleClass::find($collapsible_id)->collapsible_items;
    }

    public function popout()
    {
        return $this->property('popout');
    }

    public function type()
    {
        return $this->property('type');
    }

    public function itemsfontcolor()
    {
        return $this->property('itemsfontcolor');
    }

    public function itemsfontcolorvar()
    {
        return $this->property('itemsfontcolorvar');
    }

    public function itemsbgfontcolor()
    {
        return $this->property('itemsbgfontcolor');
    }

    public function itemsbgfontcolorvar()
    {
        return $this->property('itemsbgfontcolorvar');
    }

    public function titlefontcolor()
    {
        return $this->property('titlefontcolor');
    }

    public function titlefontcolorvar()
    {
        return $this->property('titlefontcolorvar');
    }

    public function titlebgfontcolor()
    {
        return $this->property('titlebgfontcolor');
    }

    public function titlebgfontcolorvar()
    {
        return $this->property('titlebgfontcolorvar');
    }
}
