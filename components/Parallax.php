<?php namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\MediaLibrary;
use Cms\Classes\Page;
use Illuminate\Support\Facades\Lang;

class Parallax extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Parallax',
            'description' => Lang::get('individuart.materialize::lang.backend.parallax_component_description')
        ];
    }

    public function defineProperties()
    {
        return [
            'image' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.image'),
                'type'              => 'dropdown',
                'placeholder'       => 'select image',
            ],
            'height' => [
                'title'             => Lang::get('individuart.materialize::lang.backend.height'),
                'default'           => 500,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('individuart.materialize::lang.backend.only_numeric')
            ]
        ];
    }

    public function getImageOptions(){
        $files = scandir('storage/app/media/');
        foreach($files as $ind=>$val){
            $files2[$val] = $val;
        }
        return $files2;
    }

    public function onRun()
    {
        $this->addJs('components/parallax/assets/js/parallax.js');

    }

}