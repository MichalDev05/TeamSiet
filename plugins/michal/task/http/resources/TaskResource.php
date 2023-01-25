<?php

namespace Michal\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;
use Michal\Project\Http\Resources\ProjectResource;
use Michal\Project\Models\Project;
use Rainlab\User\Facades\Auth;

class TaskResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'task_name' => $this->task_name,
            'project_id' => $this->project_id,
            'project' => new ProjectResource($this->project),
            'user' => new UserResource($this->user),

            'planned_start' => $this->planned_start,
            'planned_end' => $this->planned_end,
            'planned_time' => $this->planned_time,
            'tracked_time' => $this->tracked_time,

            'is_completed' => $this->is_completed,

            'description' => $this->description,
            'tags' => $this->tags,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }



}

?>
