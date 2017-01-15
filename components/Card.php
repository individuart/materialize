<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Individuart\Materialize\Models\Card as CardClass;
use Illuminate\Support\Facades\Request;
use Individuart\Materialize\Models\Color;

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
            'card' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.card'),
                'type'              => 'dropdown',
                'placeholder'       => ''
            ],
            'type' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_type'),
                'default'           => 'default',
                'type'              => 'dropdown',
                'placeholder'       => ''
            ],
            'stickyaction' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_sticky_action'),
                'depends'           => ['type'],
                'type'              => 'dropdown'
            ],
            'size' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_size'),
                'default'           => '',
                'type'              => 'dropdown'
            ],
            'showimage' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.label_show_image'),
                'type'              => 'dropdown',
                'default'           =>'no'
            ],
            'titlefontcolor' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.title_color'),
                'type'              => 'dropdown',
                'default'           => '',
            ],
            'titlefontcolorvar' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.title_color_variant'),
                'type'              => 'dropdown',
                'default'       => ''
            ],
            'cardbgcolor' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.background_color'),
                'type'              => 'dropdown',
                'default'           => '',
            ],
            'cardbgcolorvar' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.background_color_variant'),
                'type'              => 'dropdown',
                'default'       => ''
            ]

        ];
    }

    public function getCardOptions()
    {
        $cards = CardClass::published()->orderBy('name','asc')->get();
        $arr_cards = array();
        if($cards)
        {
            foreach($cards as $card)
            {
                $arr_cards[$card->id] = $card->name;
            }
            return $arr_cards;
        }else{
            return [];
        }

    }

    public function getTypeOptions()
    {
        return [
            'default' => Lang::get('individuart.materialize::lang.backend.default_card'),
            'horizontal' => Lang::get('individuart.materialize::lang.backend.horizontal_card'),
            'reveal' => Lang::get('individuart.materialize::lang.backend.reveal_card'),
            'panel' => Lang::get('individuart.materialize::lang.backend.card_panel')
        ];
    }

    public function getStickyactionOptions()
    {
        $cardtype = Request::input('type'); //load the type property value from POST
        $stickyaction = [
            'default' => [],
            'horizontal' => [],
            'reveal' => ['no' => 'no', 'yes' => 'yes'],
            'panel' => []
        ];

        return $stickyaction[$cardtype];

    }

    public function getSizeOptions()
    {
        return [
            '' => Lang::get('individuart.materialize::lang.backend.label_default'),
            'small' => Lang::get('individuart.materialize::lang.backend.label_small'),
            'medium' => Lang::get('individuart.materialize::lang.backend.label_medium'),
            'large' => Lang::get('individuart.materialize::lang.backend.label_large')
        ];
    }

    public function getShowimageOptions()
    {
        return [
            'no' => Lang::get('individuart.materialize::lang.backend.label_no'),
            'yes' => Lang::get('individuart.materialize::lang.backend.label_yes')
        ];
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

    public function getTitlefontcolorOptions()
    {
        return $this->getColors();
    }
    public function getTitlefontcolorvarOptions()
    {
        return $this->getColorVariants();
    }
    public function getCardbgcolorOptions()
    {
        return $this->getColors();
    }
    public function getCardbgcolorvarOptions()
    {
        return $this->getColorVariants();
    }

    public function onRun()
    {
        $this->addJs('components/collapsible/assets/js/default.js');

    }

    public function card(){
        $card_id = $this->property('card');
        $card = CardClass::find($card_id);
        return $card;
    }
    public function stickyaction(){
        return $this->property('stickyaction');
    }
    public function size(){
        return $this->property('size');
    }
    public function type(){
        return $this->property('type');
    }
    public function showimage(){
        return $this->property('showimage');
    }

    public function titlefontcolor(){
        return $this->property('titlefontcolor');
    }
    public function titlefontcolorvar(){
        return $this->property('titlefontcolorvar');
    }
    public function cardbgcolor(){
        return $this->property('cardbgcolor');
    }
    public function cardbgcolorvar(){
        return $this->property('cardbgcolorvar');
    }




}