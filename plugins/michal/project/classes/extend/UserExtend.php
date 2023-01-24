<?php

namespace Michal\Project\Classes\Extend;


class UserExtend{
    public static function extendUser(){
        \RainLab\User\Models\User::extend(function($model) {
            $model->hasMany['projects'] = [\Michal\Project\Models\Project::class];
            $model->hasMany['accounted_projects'] = [\Michal\Project\Models\Project::class];
        });
    }
}




?>
