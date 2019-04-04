<?php namespace OctoClub\Tutorial;

use Backend;
use System\Classes\PluginBase;

/**
 * Tutorial Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Tutorial',
            'description' => 'No description provided yet...',
            'author'      => 'OctoClub',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'OctoClub\Tutorial\Components\Catalog'  => 'OctoClubCatalog',
            'OctoClub\Tutorial\Components\Category' => 'OctoClubCategory',
            'OctoClub\Tutorial\Components\Item'     => 'OctoClubItem',
            'OctoClub\Tutorial\Components\Feedback' => 'OctoClubFeedback',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'octoclub.tutorial.some_permission' => [
                'tab' => 'Tutorial',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'tutorial' => [
                'label'       => 'Tutorial',
                'url'         => Backend::url('octoclub/tutorial/items'),
                'icon'        => 'icon-leaf',
                'permissions' => ['octoclub.tutorial.*'],
                'order'       => 500,
                'sideMenu' => [
                    'items' => [
                        'label'       => 'Предметы',
                        'url'         => Backend::url('octoclub/tutorial/items'),
                        'icon'        => 'icon-leaf',
                        'permissions' => ['octoclub.tutorial.*'],
                        'order'       => 500,
                    ],
                    'categories' => [
                        'label'       => 'Категории',
                        'url'         => Backend::url('octoclub/tutorial/categories'),
                        'icon'        => 'icon-leaf',
                        'permissions' => ['octoclub.tutorial.*'],
                        'order'       => 500,
                    ],
                ]
            ],
        ];
    }
}
