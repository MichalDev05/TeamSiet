<?php

namespace Michal\TimeEntry\Http\Controllers;

Use \Carbon\Carbon;
use DateTime;
use Michal\TimeEntry\Http\Resources\TimeEntryResource;
use Michal\TimeEntry\Models\TimeEntry;
use Illuminate\Support\Facades\Event;
use Illuminate\Routing\Controller;


class TimeEntryController extends Controller{

    public function getTaskTimeentries()
    {

        return TimeEntryResource::collection(TimeEntry::where("task_id", post("taskId"))->get());
    }


    public function getUserTimeentries()
    {
        return TimeEntryResource::collection(TimeEntry::where("user_id", auth()->user()->id)->get());


    }



    public function newTimeentry()
    {

        $timeentry = new TimeEntry;

        $timeentry->start_time = new DateTime();
        $timeentry->task_id = post("taskId");
        $timeentry->user_id = auth()->user()->id;
        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }

    public function endTimeentry()
    {
        $timeentry = TimeEntry::where("task_id", post("taskId"))
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
        return TimeEntryResource::make($timeentry);
    }







    public function deleteTimeentry()
    {

        $timeentry = TimeEntry::where("task_id", post("taskId"))
            ->where("user_id", auth()->user()->id)
            ->where("id",  post("id"))
            ->firstOrFail();

        $timeentry->delete();
        return "Timeentry " . post("id") . " was deleted!";
    }


}

?>
