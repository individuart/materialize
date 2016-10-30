<?php namespace Individuart\Materialize\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Individuart\Materialize\Models\Carousel as CarouselClass;
use October\Rain\Support\Facades\Flash;

/**
 * Carousels Back-end Controller
 */
class Carousels extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ReorderController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Individuart.Materialize', 'materialize', 'carousels');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $carouselId) {
                if (!$car = CarouselClass::find($carouselId))
                    continue;
                if($car->carousel_items) {
                    foreach($car->carousel_items as $car_item){
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