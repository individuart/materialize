<?php namespace Individuart\Materialize;

use Backend;
use System\Classes\PluginBase;

/**
 * Materialize Plugin Information File
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
            'name'        => 'Materialize',
            'description' => 'individuart.materialize::lang.plugin.description',
            'author'      => 'Individuart',
            'icon'        => 'icon-th-large'
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
            'Individuart\Materialize\Components\Carousel' => 'Carousel',
            'Individuart\Materialize\Components\Parallax' => 'Parallax',
            'Individuart\Materialize\Components\Collapsible' => 'Collapsible',
            'Individuart\Materialize\Components\Card' => 'Card'
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {

        return [
            'individuart.materialize.some_permission' => [
                'tab' => 'Materialize',
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
        //return []; // Remove this line to activate

        return [
            'materialize' => [
                'label'       => 'Materialize',
                'url'         => Backend::url('individuart/materialize/carousels'),
                'icon'        => 'icon-columns',
                'permissions' => ['individuart.materialize.*'],
                'order'       => 500,
                'sideMenu' => [
                    'carousels' => [
                        'label' => 'individuart.materialize::lang.backend.carousels',
                        'icon' => 'icon-arrows-h',
                        'url' => Backend::url('individuart/materialize/carousels'),
                    ],
                    'collapsibles' => [
                        'label' => 'individuart.materialize::lang.backend.collapsibles',
                        'icon' => 'icon-tasks',
                        'url' => Backend::url('individuart/materialize/collapsibles'),
                    ],
                    'cards' => [
                        'label' => 'individuart.materialize::lang.backend.cards',
                        'icon' => 'icon-picture-o',
                        'url' => Backend::url('individuart/materialize/cards'),
                    ]
                ]
            ]
        ];
    }


    /**
     * Register components as snippets for RainLab Pages Plugin
     */
    public function registerPageSnippets()
    {
        return [
            'Individuart\Materialize\Components\Carousel' => 'carousel',
            'Individuart\Materialize\Components\Parallax' => 'parallax',
            'Individuart\Materialize\Components\Collapsible' => 'collapsible',
            'Individuart\Materialize\Components\Card' => 'card'
        ];
    }

}
