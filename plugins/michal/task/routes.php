<?php

use Michal\Task\Http\Controllers\TaskController;







Route::prefix('api/v1')->group(function () {



    Route::middleware(['auth'])->group(function () {
        Route::post("newTask", [TaskController::class, 'newTask']);
        Route::post("getProjectTasks/{id}", [TaskController::class, 'getProjectTasks']);
        Route::post("editTask/{id}", [TaskController::class, 'editTask']);
        Route::post("completeTask/{id}", [TaskController::class, 'completeTask']);
        Route::post("deleteTask/{id}", [TaskController::class, 'deleteTask']);

    });


});

?>
