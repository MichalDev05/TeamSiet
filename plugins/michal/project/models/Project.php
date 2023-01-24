<?php namespace Michal\Project\Models;

use Model;

/**
 * project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'michal_project_projects';

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
        'due_date'
    ];

    /**
     * @var array Relations
     */

    public $hasMany = [
        "tasks" => ["Michal\Task\Model\Task"]
    ];
    public $belongsTo = [
        "project_manager" => ["Rainlab\User\Models\User"],
        "customer" => ["Rainlab\User\Models\User"]
    ];
    public $belongsToMany = [
        "accounting_users" => ["Rainlab\User\Models\User", "table" => "michal_project_accountants"]
    ];

}
