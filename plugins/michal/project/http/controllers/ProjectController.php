<?php

namespace Michal\Project\Http\Controllers;

use Michal\Project\Http\Resources\ProjectResource;
use Michal\Project\Models\Project;
use Illuminate\Support\Facades\Event;
use Illuminate\Routing\Controller;


class ProjectController extends Controller{

    public function getAllProjects()
    {
        return ProjectResource::collection(Project::all());
    }


    public function getMyProjects()
    {
        return ProjectResource::collection(Project::where("project_manager_id", auth()->user()->id)->get());


    }



    public function newProject()
    {
        $project = new Project;
        $project->project_name = post("projectName");
        $project->customer = post("customer");
        $project->project_manager_id = auth()->user()->id;
        $project->customer_id = post("customerId");
        $project->save();
        return ProjectResource::make($project);
    }



    public function editProject($id)
    {
        //$id = post("id");
        if ($id == null) return "error: Project id is not set!";

        $project = Project::where("id", $id)
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        $project->project_name = post("projectName") ?: $project->project_name;
        $project->customer_id = post("customerId") ?:  $project->customer_id;
        $project->project_manager_id = auth()->user()->id;
        $project->due_date = post("dueDate")?:  $project->due_date;
        $project->budget_type = post("budgetType")?: $project->budget_type;
        $project->budget = post("budget")?: $project->budget;
        $project->is_completed = post("isCompleted")?: $project->is_completed;
        $project->save();
        return ProjectResource::make($project);

    }

    public function completeProject($id){
        //$id = post("id");
        if ($id == null) return "error: Project id is not set!";

        $project = Project::where("id", $id)
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        $project->is_completed = post("isCompleted")?: $project->is_completed;
        $project->save();
        return ProjectResource::make($project);
    }

    public function deleteProject($id)
    {
        //$id = post("id");
        if ($id == null) return "error: Project id is not set!";

        $project = Project::where("id", $id)
            ->where("project_manager_id", auth()->user()->id)
            ->firstOrFail();

        $project->delete();
        return "Project " . $id . " was deleted!";
    }


}

?>
