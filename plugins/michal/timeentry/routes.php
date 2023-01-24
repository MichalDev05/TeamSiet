<?php

use Michal\TimeEntry\Http\Controllers\TimeEntryController;







Route::prefix('api/v1')->group(function () {




    Route::middleware(['auth'])->group(function () {
        Route::post("getTaskTimeentries", [TimeEntryController::class, 'getTaskTimeentries']);
        Route::post("getUserTimeentries", [TimeEntryController::class, 'getUserTimeentries']);
        Route::get("getMyProjects", [TimeEntryController::class, 'getMyProjects']);
        Route::post("endTimeentry", [TimeEntryController::class, 'endTimeentry']);
        Route::post("newTimeentry", [TimeEntryController::class, 'newTimeentry']);
        Route::post("deleteTimeentry", [TimeEntryController::class, 'deleteTimeentry']);

    });


});

?>
