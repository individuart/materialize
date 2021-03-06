<?php

namespace Individuart\Materialize\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

/**
 * Cards Back-end Controller.
 */
class Cards extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Individuart.Materialize', 'materialize', 'cards');
    }
}
