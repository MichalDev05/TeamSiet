<?php namespace Michal\Task\Models;

use Carbon\Carbon;
use Model;

/**
 * task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'michal_task_tasks';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'planned_start',
        'planned_end',
        'planned_time'

    ];

    /**
     * @var array Relations
     */

    public $hasMany = [
        "time_entries" => ["Michal\TimeEntry\Models\TimeEntry"]
    ];

    public $belongsTo = [
        "project" => ["Michal\Project\Models\Project"],
        "user" => ["Rainlab\User\Models\User"]
    ];

    public function beforeSave(){
        $this->getTrackedTimeAttribute();
    }
    public function beforeCreate(){
        $this->getTrackedTimeAttribute();
    }


    public function getTrackedTimeAttribute()
    {

        $time = new Carbon(0-0-0);


        foreach ($this->time_entries as $timeEntry) {
            $newTime = Carbon::parse($timeEntry->total_time);
            $time->addSecond($newTime->second);
            $time->addMinute($newTime->minute);
            $time->addHour($newTime->hour);


        }
        $this->tracked_time = $time;
        echo($time->format('H:i:s'));
    }


}
