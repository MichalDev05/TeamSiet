<?php

namespace Michal\Project\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;
use Rainlab\User\Facades\Auth;

class ProjectResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'project_name' => $this->project_name,
            'customer_id' => $this->customer_id,
            'customer' => new UserResource($this->customer),
            'project_manager_id' => $this->project_manager_id,
            'project_manager' => new UserResource($this->project_manager),

            'due_date' => $this->due_date,

            'budget_type' => $this->budget_type,
            'budget' => $this->budget,

            'is_completed' => $this->is_completed,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }



}

?>
