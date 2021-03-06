<?php

namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Individuart\Materialize\Models\Carousel as CarouselClass;

class Carousel extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => Lang::get('individuart.materialize::lang.backend.carousel'),
            'description' => Lang::get('individuart.materialize::lang.backend.carousel_component_description'),
        ];
    }

    public function defineProperties()
    {
        return [
            'carousel' => [
                'title' => Lang::get('individuart.materialize::lang.backend.carousel'),
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
            ],

        ];
    }

    public function getCarouselOptions()
    {
        $carousels = CarouselClass::published()->orderBy('sort_order', 'asc')->get();
        $arr_carousels = [];
        if ($carousels) {
            foreach ($carousels as $carousel) {
                $arr_carousels[$carousel->id] = $carousel->name;
            }

            return $arr_carousels;
        }

        return [];
    }

    public function getTypeOptions()
    {
        return [
            '1' => Lang::get('individuart.materialize::lang.backend.default'),
            '2' => Lang::get('individuart.materialize::lang.backend.full_width'),
            '3' => Lang::get('individuart.materialize::lang.backend.full_screen'),
        ];
    }

    public function onRun()
    {
        $type = $this->property('type');

        switch ($type) {
            case 1:
                $this->addJs('components/carousel/assets/js/default.js');
                break;
            case 2:
                $this->addJs('components/carousel/assets/js/full_width.js');
                break;
            case 3:
                $this->addJs('components/carousel/assets/js/full_screen.js');
                break;
        }
    }

    public function carousel_items()
    {
        $carousel_id = $this->property('carousel');

        return CarouselClass::find($carousel_id)->carousel_items;
    }
}
