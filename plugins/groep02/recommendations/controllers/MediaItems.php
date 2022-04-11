<?php namespace Groep02\Recommendations\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;

/**
 * Media Items Back-end Controller
 */
class MediaItems extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Groep02.Recommendations', 'recommendations', 'mediaitems');
    }
}
