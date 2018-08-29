<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
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
            /*
            'items' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.items'),
                'description'       => Lang::get('individuart.materialize::lang.backend.items_description'),
                'default'           => 5,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('individuart.materialize::lang.backend.items_validation')
            ],*/
            'type' => [
                'title' => Lang::get('individuart.materialize::lang.backend.label_type'),
                'default' => 1,
                'type' => 'dropdown',
                'placeholder' => '',
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

    public function getTypeOptions()
    {
        return [
            '1' => Lang::get('individuart.materialize::lang.backend.default'),
            '2' => Lang::get('individuart.materialize::lang.backend.full_width'),
            '3' => Lang::get('individuart.materialize::lang.backend.full_screen')
        ];
    }

    public function onRun()
    {
        $type = $this->property('type');

        switch ($type) {
            case 1:
                $this->addJs('components/slider/assets/js/slider.js');
                break;
            case 2:
                $this->addJs('components/slider/assets/js/slider.js');
                break;
            case 3:
                $this->addJs('components/slider/assets/js/slider.js');
                break;
        }

    }

    public function slider_items()
    {
        $slider_id = $this->property('slider');
        $slider_items = SliderClass::find($slider_id)->slider_items;
        return $slider_items;
    }

}