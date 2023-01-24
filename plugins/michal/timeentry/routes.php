<?php

use Michal\TimeEntry\Http\Controllers\TimeEntryController;







Route::prefix('api/v1')->group(function () {




    Route::middleware(['auth'])->group(function () {
        Route::post("getTaskTimeentries/{id}", [TimeEntryController::class, 'getTaskTimeentries']);
        Route::post("getUserTimeentries", [TimeEntryController::class, 'getUserTimeentries']);
        Route::post("newTimeentry", [TimeEntryController::class, 'newTimeentry']);
        Route::get("getTimeentry/{id}", [TimeEntryController::class, 'getTimeentry']);
        Route::post("endTimeentry/{id}", [TimeEntryController::class, 'endTimeentry']);
        Route::post("deleteTimeentry/{id}", [TimeEntryController::class, 'deleteTimeentry']);

    });


});

?>
