<?php

use Michal\Task\Http\Controllers\TaskController;







Route::prefix('api/v1')->group(function () {



    Route::middleware(['auth'])->group(function () {
        Route::post("newTask", [TaskController::class, 'newTask']);
        Route::post("getProjectTasks", [TaskController::class, 'getProjectTasks']);
        Route::post("editTask", [TaskController::class, 'editTask']);
        Route::post("completeTask", [TaskController::class, 'completeTask']);
        Route::post("deleteTask", [TaskController::class, 'deleteTask']);

    });


});

?>
