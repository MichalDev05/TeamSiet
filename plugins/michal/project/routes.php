<?php

use Michal\Project\Http\Controllers\ProjectController;







Route::prefix('api/v1')->group(function () {



    Route::get("getAllProjects", [ProjectController::class, 'getAllProjects']);

    Route::middleware(['auth'])->group(function () {
        Route::get("getMyProjects", [ProjectController::class, 'getMyProjects']);
        Route::post("newProject", [ProjectController::class, 'newProject']);
        Route::post("editProject/{id}", [ProjectController::class, 'editProject']);
        Route::post("completeProject/{id}", [ProjectController::class, 'completeProject']);
        Route::post("deleteProject/{id}", [ProjectController::class, 'deleteProject']);

    });


});

?>
