<?php

use Michal\Timeentry\Http\Controllers\TimeentryController;







Route::prefix('api/v1')->group(function () {




    Route::middleware(['auth'])->group(function () {
        Route::post("getTaskTimeentries", [TimeentryController::class, 'getTaskTimeentries']);
        Route::post("getUserTimeentries", [TimeentryController::class, 'getUserTimeentries']);
        Route::get("getMyProjects", [TimeentryController::class, 'getMyProjects']);
        Route::post("endTimeentry", [TimeentryController::class, 'endTimeentry']);
        Route::post("newTimeentry", [TimeentryController::class, 'newTimeentry']);
        Route::post("deleteTimeentry", [TimeentryController::class, 'deleteTimeentry']);

    });


});

?>
