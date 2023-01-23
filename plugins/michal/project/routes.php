<?php

use Michal\Project\Http\Controllers\ProjectController;







Route::prefix('api/v1')->group(function () {



    Route::get("getAllProjects", [ProjectController::class, 'getAllProjects']);

    Route::middleware(['auth'])->group(function () {
        Route::get("getMyProjects", [ProjectController::class, 'getMyProjects']);
        Route::post("newProject", [ProjectController::class, 'newProject']);
        Route::post("editProject", [ProjectController::class, 'editProject']);
        Route::post("completeProject", [ProjectController::class, 'completeProject']);
        Route::post("deleteProject", [ProjectController::class, 'deleteProject']);

    });


});

?>
