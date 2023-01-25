<?php

use Michal\Project\Http\Controllers\ProjectController;
use Michal\Project\Http\Middlewares\ProjectManagerMiddleware;






Route::prefix('api/v1')->group(function () {



    Route::get("getAllProjects", [ProjectController::class, 'getAllProjects']);

    Route::middleware(['auth'])->group(function () {
        Route::middleware([ProjectManagerMiddleware::class])->group(function () {
            Route::post("editProject/{id}", [ProjectController::class, 'editProject']);
        });
        Route::get("getMyProjects", [ProjectController::class, 'getMyProjects']);
        Route::post("newProject", [ProjectController::class, 'newProject']);
        //Route::post("editProject/{id}", [ProjectController::class, 'editProject']);
        Route::post("completeProject/{id}", [ProjectController::class, 'completeProject']);
        Route::post("deleteProject/{id}", [ProjectController::class, 'deleteProject']);

    });


});

?>
