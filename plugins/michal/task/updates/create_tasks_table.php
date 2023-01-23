<?php namespace Michal\Task\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('michal_task_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('task_name');
            $table->integer('project_id');

            $table->date('planned_start')->nullable();
            $table->date('planned_end')->nullable();
            $table->time('planned_time')->nullable();
            $table->time('tracked_time')->nullable();

            $table->boolean('is_completed')->default(false);

            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michal_task_tasks');
    }
}
