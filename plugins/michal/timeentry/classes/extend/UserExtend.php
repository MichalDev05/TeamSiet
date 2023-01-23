<?php

namespace Michal\Timeentry\Classes\Extend;


class UserExtend{
    public static function extendUser(){
        \RainLab\User\Models\User::extend(function($model) {
            $model->hasMany['timeentries'] = [\Michal\Timeentry\Models\Timeentry::class];
        });
    }
}




?>
