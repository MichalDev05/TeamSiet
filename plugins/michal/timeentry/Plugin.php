<?php namespace Michal\Timeentry;


use Backend;
use System\Classes\PluginBase;

/**
 * timeentry Plugin Information File
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
            'name'        => 'timeentry',
            'description' => 'No description provided yet...',
            'author'      => 'michal',
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
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'timeentry' => [
                'label'       => 'timeentry',
                'url'         => Backend::url('michal/timeentry/timeentries'),
                'icon'        => 'icon-leaf',
                'permissions' => ['michal.timeentry.*'],
                'order'       => 500,
            ],
        ];
    }
}
