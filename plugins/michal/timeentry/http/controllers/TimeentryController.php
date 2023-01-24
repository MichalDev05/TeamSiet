<?php

namespace Michal\TimeEntry\Http\Controllers;

Use \Carbon\Carbon;
use DateTime;
use Michal\TimeEntry\Http\Resources\TimeEntryResource;
use Michal\TimeEntry\Models\TimeEntry;
use Illuminate\Support\Facades\Event;
use Illuminate\Routing\Controller;


class TimeEntryController extends Controller{

    public function getTaskTimeentries($id)
    {

        return TimeEntryResource::collection(TimeEntry::where("task_id", $id)->get());
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

    public function endTimeentry($id)
    {
        $timeentry = TimeEntry::where("user_id", auth()->user()->id)
        ->where("id", $id)
        ->firstOrFail();



        $timeentry->end_time = new DateTime();


        $timeentry->save();
        return TimeEntryResource::make($timeentry);
    }




    public function getTimeentry($id)
    {
        return TimeEntry::where("user_id", auth()->user()->id)
        ->where("id",  $id)
        ->firstOrFail();
    }





    public function deleteTimeentry($id)
    {

        $timeentry = TimeEntry::where("user_id", auth()->user()->id)
            ->where("id", $id)
            ->firstOrFail();

        $timeentry->delete();
        return "Timeentry " . post("id") . " was deleted!";
    }


}

?>
