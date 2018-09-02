<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
use Individuart\Materialize\Models\Color;
use Individuart\Materialize\Models\Slider as SliderClass;

class Slider extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => Lang::get('individuart.materialize::lang.backend.slider'),
            'description' => Lang::get('individuart.materialize::lang.backend.slider_component_description')
        ];
    }

    public function defineProperties()
    {
        return [
            'slider' => [
                'title' => Lang::get('individuart.materialize::lang.backend.slider'),
                'type' => 'dropdown',
                'placeholder' => '',
            ],
            'showtexts' => [
                'title' => Lang::get('individuart.materialize::lang.backend.label_show_texts'),
                'type' => 'dropdown',
                'default' => 'no'
            ],
            'showindicators' => [
                'title' => Lang::get('individuart.materialize::lang.backend.label_show_indicators'),
                'type' => 'dropdown',
                'default' => 'no'
            ],
            'textalign' => [
                'title' => Lang::get('individuart.materialize::lang.backend.label_text_align'),
                'type' => 'dropdown',
                'default' => 'center'
            ],
            'titlefontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'titlefontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.title_color_variant'),
                'type' => 'dropdown',
                'default' => ''
            ],
            'subtitlefontcolor' => [
                'title' => Lang::get('individuart.materialize::lang.backend.subtitle_color'),
                'type' => 'dropdown',
                'default' => '',
            ],
            'subtitlefontcolorvar' => [
                'title' => Lang::get('individuart.materialize::lang.backend.subtitle_color_variant'),
                'type' => 'dropdown',
                'default' => ''
            ],
            'height' => [
                'title' => Lang::get('individuart.materialize::lang.backend.height'),
                'default' => 450,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('individuart.materialize::lang.backend.only_numeric')
            ]


        ];
    }


    public function getSliderOptions()
    {
        $sliders = SliderClass::published()->orderBy('sort_order', 'asc')->get();
        $arr_sliders = array();
        if ($sliders) {
            foreach ($sliders as $slider) {
                $arr_sliders[$slider->id] = $slider->name;
            }
            return $arr_sliders;
        } else {
            return [];
        }

    }

    public function getShowtextsOptions()
    {
        return [
            false => Lang::get('individuart.materialize::lang.backend.label_no'),
            true => Lang::get('individuart.materialize::lang.backend.label_yes')
        ];
    }

    public function getTextalignOptions()
    {
        return [
            'left-align' => Lang::get('individuart.materialize::lang.backend.left'),
            'center-align' => Lang::get('individuart.materialize::lang.backend.center'),
            'right-align' => Lang::get('individuart.materialize::lang.backend.right')
        ];
    }

    public function getShowindicatorsOptions()
    {
        return [
            false => Lang::get('individuart.materialize::lang.backend.label_no'),
            true => Lang::get('individuart.materialize::lang.backend.label_yes')
        ];
    }


    public function getTitlefontcolorOptions()
    {
        return Color::getColors();
    }

    public function getTitlefontcolorvarOptions()
    {
        return Color::getColorVariants();
    }

    public function getSubtitlefontcolorOptions()
    {
        return Color::getColors();
    }

    public function getSubtitlefontcolorvarOptions()
    {
        return Color::getColorVariants();
    }


    public function onRun()
    {
        $this->addJs('components/slider/assets/js/slider.js');
    }

    public function showtexts()
    {
        return $this->property('showtexts');
    }

    public function height()
    {
        return $this->property('height');
    }

    public function showindicators()
    {
        return $this->property('showindicators');
    }

    public function textalign()
    {
        return $this->property('textalign');
    }

    public function titlefontcolor()
    {
        return $this->property('titlefontcolor');
    }

    public function titlefontcolorvar()
    {
        return $this->property('titlefontcolorvar');
    }

    public function subtitlefontcolor()
    {
        return $this->property('subtitlefontcolor');
    }

    public function subtitlefontcolorvar()
    {
        return $this->property('subtitlefontcolorvar');
    }

    public function slider_items()
    {
        $slider_id = $this->property('slider');
        $slider_items = SliderClass::find($slider_id)->slider_items;
        return $slider_items;
    }

}