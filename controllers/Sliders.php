<?php

namespace Individuart\Materialize\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Individuart\Materialize\Models\Slider as SliderClass;
use October\Rain\Support\Facades\Flash;

/**
 * Sliders Back-end Controller.
 */
class Sliders extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ReorderController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Individuart.Materialize', 'materialize', 'sliders');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $sliderId) {
                if (!$car = SliderClass::find($sliderId)) {
                    continue;
                }
                if ($car->slider_items) {
                    foreach ($car->slider_items as $car_item) {
                        $car_item->delete();
                    }
                }
                $car->delete();
            }

            Flash::success(e(trans('individuart.materialize::lang.backend.successfully_deleted')));
        }

        return $this->listRefresh();
    }
}
