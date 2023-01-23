<?php

namespace Michal\Timeentry\Http\Controllers;

Use \Carbon\Carbon;
use DateTime;
use Michal\Timeentry\Http\Resources\TimeentryResource;
use Michal\Timeentry\Models\Timeentry;
use Illuminate\Support\Facades\Event;
use Illuminate\Routing\Controller;


class TimeentryController extends Controller{

    public function getTaskTimeentries()
    {

        return TimeentryResource::collection(Timeentry::where("task_id", post("taskId"))->get());
    }


    public function getUserTimeentries()
    {
        return TimeentryResource::collection(Timeentry::where("user_id", auth()->user()->id)->get());


    }



    public function newTimeentry()
    {

        $timeentry = new Timeentry;

        $timeentry->start_time = new DateTime();
        $timeentry->task_id = post("taskId");
        $timeentry->user_id = auth()->user()->id;
        $timeentry->save();
        return TimeentryResource::make($timeentry);
    }

    public function endTimeentry()
    {
        $timeentry = Timeentry::where("task_id", post("taskId"))
            ->where("user_id", auth()->user()->id)
            ->where("id",  post("id"))
            ->firstOrFail();


        $timeentry->end_time = new DateTime();

        $startTime = new DateTime($timeentry->start_time);
        $endTime = new DateTime();
        $diffTime = $startTime->diff($endTime);
        //return $diffTime->format('%Y-%m-%d %H:%i:%s');


        $timeentry->total_time = $diffTime->format('%Y-%m-%d %H:%i:%s');
        $timeentry->save();
        return TimeentryResource::make($timeentry);
    }







    public function deleteTimeentry()
    {

        $timeentry = Timeentry::where("task_id", post("taskId"))
            ->where("user_id", auth()->user()->id)
            ->where("id",  post("id"))
            ->firstOrFail();

        $timeentry->delete();
        return "Timeentry " . post("id") . " was deleted!";
    }


}

?>
