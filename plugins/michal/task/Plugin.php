<?php namespace Michal\Task;

use Backend;
use Michal\TimeEntry\Models\TimeEntry;
use System\Classes\PluginBase;
use Michal\TimeEntry\Classes\Extend\UserExtend;

/**
 * task Plugin Information File
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
            'name'        => 'task',
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
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'task' => [
                'label'       => 'task',
                'url'         => Backend::url('michal/task/tasks'),
                'icon'        => 'icon-leaf',
                'permissions' => ['michal.task.*'],
                'order'       => 500,
            ],
        ];
    }

    public function boot(){
        UserExtend::extendUser();
    }

}
