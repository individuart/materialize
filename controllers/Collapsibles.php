<?php namespace Individuart\Materialize\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Individuart\Materialize\Models\Collapsible as CollapsibleClass;
use October\Rain\Support\Facades\Flash;

/**
 * Collapsibles Back-end Controller
 */
class Collapsibles extends Controller
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

        BackendMenu::setContext('Individuart.Materialize', 'materialize', 'collapsibles');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $collapId) {
                if (!$coll = CollapsibleClass::find($collapId))
                    continue;
                if($coll->collapsible_items) {
                    foreach($coll->collapsible_items as $collap_item){
                        $collap_item->delete();
                    }

                }
                $coll->delete();
            }

            Flash::success(e(trans('individuart.materialize::lang.backend.successfully_deleted')));
        }

        return $this->listRefresh();
    }

}