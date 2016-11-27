<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;
use Individuart\Materialize\Models\Collapsible as CollapsibleClass;

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
                'placeholder'       => '',
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

}