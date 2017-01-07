<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;

class Card extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => Lang::get('individuart.materialize::lang.backend.card'),
            'description' => Lang::get('individuart.materialize::lang.backend.card_component_description')
        ];
    }

    public function defineProperties()
    {
        return [
            'type' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_type'),
                'default'           => 1,
                'type'              => 'dropdown',
                'placeholder'       => ''
            ],
            'stickyaction' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_sticky_action'),
                'depends'           => ['type'],
                'type'              => 'dropdown'
            ]
        ];
    }

    public function getTypeOptions()
    {
        return [
            '1' => Lang::get('individuart.materialize::lang.backend.default_card'),
            '2' => Lang::get('individuart.materialize::lang.backend.horizontal_card'),
            '3' => Lang::get('individuart.materialize::lang.backend.reveal_card')
        ];
    }

    public function getStickyactionOptions()
    {
        $cardtype = Request::input('type'); //load the type property value from POST
        $stickyaction = [
            '1' => [],
            '2' => [],
            '3' => ['no' => false, 'yes' => true]
        ];

        return $stickyaction[$cardtype];

    }

}