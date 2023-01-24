<?php

namespace Michal\TimeEntry\Classes\Extend;


class UserExtend{
    public static function extendUser(){
        \RainLab\User\Models\User::extend(function($model) {
            $model->hasMany['time_entries'] = [\Michal\TimeEntry\Models\TimeEntry::class];
        });
    }
}




?>
