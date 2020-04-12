<?php

namespace Individuart\Materialize\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Lang;

class Parallax extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Parallax',
            'description' => Lang::get('individuart.materialize::lang.backend.parallax_component_description'),
        ];
    }

    public function defineProperties()
    {
        return [
            'image' => [
                'title' => Lang::get('individuart.materialize::lang.backend.image'),
                'type' => 'dropdown',
                'placeholder' => 'select image',
            ],
            'height' => [
                'title' => Lang::get('individuart.materialize::lang.backend.height'),
                'default' => 500,
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('individuart.materialize::lang.backend.only_numeric'),
            ],
        ];
    }

    public function getImageOptions()
    {
        $allowed_extensions = ['jpg', 'png', 'gif'];
        $files = scandir('storage/app/media/');
        if (!empty($files)) {
            foreach ($files as $ind => $val) {
                $extension = strtolower(substr(strrchr($val, '.'), 1));
                if (in_array($extension, $allowed_extensions)) {
                    $files2[$val] = '<img src="/storage/app/media/'.$val.'" width="140">';
                }
            }

            return $files2;
        }

        return [];
    }

    public function onRun()
    {
        $this->addJs('components/parallax/assets/js/parallax.js');
    }
}
