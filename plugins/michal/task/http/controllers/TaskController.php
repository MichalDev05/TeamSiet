<?php

namespace Michal\Task\Http\Controllers;

use Michal\Task\Http\Resources\TaskResource;
use Michal\Task\Models\Task;
use Michal\Project\Models\Project;
use Illuminate\Routing\Controller;

class TaskController extends Controller{





    public function newTask()
    {


        //If Fails, User Does Not Have Access To Project In Wich This Task Is Part Of.
        Project::where("id", post("projectId"))
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        $task = new Task;
        $task->project_id = post("projectId");
        $task->task_name = post("taskName");
        $task->planned_start = post("plannedStart");
        $task->planned_end = post("plannedEnd");
        $task->planned_time =post("plannedTime");
        $task->tracked_time = post("trackedTime");

        $task->tracked_time = post("trackedTime");

        $task->description = post("description");
        $task->tags = post("tags");

        $task->save();
        return TaskResource::make($task);
    }

    public function getProjectTasks($id)
    {

        //If Fails, User Does Not Have Access To Project In Wich This Task Is Part Of.
        Project::where("id", $id)
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        return TaskResource::collection(Task::where("project_id", post("projectId"))
            ->get());


    }


    public function editTask($id)
    {

        if ($id == null) return "error: Task id is not set!";

        //If Fails, User Does Not Have Access To Project In Wich This Task Is Part Of.
        Project::where("id", post("projectId"))
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();


        $task = Task::where("id", $id)
            ->firstOrFail();



        $task->planned_start = post("plannedStart")?:$task->planned_start;
        $task->planned_end = post("plannedEnd")?:$task->planned_end;
        $task->planned_time =post("plannedTime")?:$task->planned_time;
        $task->tracked_time = post("trackedTime")?:$task->tracked_time;

        $task->tracked_time = post("trackedTime")?: $task->tracked_time;

        $task->description = post("description")?:$task->description;
        $task->is_completed = post("isCompleted")?:$task->is_completed;

        $task->tags = post("tags")?: $task->tags;



        $task->save();
        return TaskResource::make($task);

    }

    public function completeTask($id){
        //$id = post("id");
        if ($id == null) return "error: Task id is not set!";

        //If Fails, User Does Not Have Access To Project In Wich This Task Is Part Of.
        Project::where("id", post("projectId"))
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        $task = Task::where("id", $id)
            ->firstOrFail();

        //$task->getTrackedTimeAttribute();

        $task->is_completed = post("isCompleted")?: $task->is_completed;
        $task->save();
        return TaskResource::make($task);
    }

    public function deleteTask($id)
    {
        //$id = post("id");
        if ($id == null) return "error: Task id is not set!";

        //If Fails, User Does Not Have Access To Project In Wich This Task Is Part Of.
        Project::where("id", post("projectId"))
        ->where("project_manager_id", auth()->user()->id)
        ->firstOrFail();

        $task = Task::where("id", $id)
            ->firstOrFail();

        $task->delete();
        return "Task " . $id . " was deleted!";
    }


}

?>
