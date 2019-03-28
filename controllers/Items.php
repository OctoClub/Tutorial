<?php namespace OctoClub\Tutorial\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Items Back-end Controller
 */
class Items extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('OctoClub.Tutorial', 'tutorial', 'items');
    }
}
