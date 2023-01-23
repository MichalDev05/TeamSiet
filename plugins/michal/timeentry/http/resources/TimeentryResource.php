<?php

namespace Michal\Timeentry\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Rainlab\User\Facades\Auth;

class TimeentryResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'total_time' => $this->total_time,

            'task_id' => $this->task_id,
            'user_id' => $this->user_id,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }



}

?>
