<?php namespace Michal\Project;

use Backend;
use System\Classes\PluginBase;
use Michal\Project\Classes\Extend\UserExtend;
use Illuminate\Support\Facades\Event;

/**
 * project Plugin Information File
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
            'name'        => 'project',
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
            'project' => [
                'label'       => 'project',
                'url'         => Backend::url('michal/project/projects'),
                'icon'        => 'icon-leaf',
                'permissions' => ['michal.project.*'],
                'order'       => 500,
            ],
        ];
    }

    public function boot(){
        UserExtend::extendUser();


    }

}
