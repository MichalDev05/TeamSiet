<?php

namespace Michal\TimeEntry\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;
use Michal\Task\Http\Resources\TaskResource;
use Michal\Task\Models\Task;
use Rainlab\User\Facades\Auth;

class TimeEntryResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'total_time' => $this->total_time,

            'task_id' => $this->task_id,
            'task' => new TaskResource($this->task),
            //'user_id' => $this->user_id,
            'user' => new UserResource($this->user),


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }



}

?>
