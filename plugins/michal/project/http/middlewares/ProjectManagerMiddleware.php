<?php

namespace Michal\Project\Http\Middlewares;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;
use Michal\Project\Models\Project;

use Closure;

class ProjectManagerMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');
        $project = Project::where("id", $id)
        ->firstOrFail();

        if ($project->project_manager_id != auth()->user()->id) {
            return "You are not project manager!";
        }
        return $next($request);
    }
}
