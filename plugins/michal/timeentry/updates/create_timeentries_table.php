<?php namespace Michal\Timeentry\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeentriesTable extends Migration
{
    public function up()
    {
        Schema::create('michal_timeentry_timeentries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->time('total_time')->nullable();

            $table->integer('task_id');
            $table->integer('user_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michal_timeentry_timeentries');
    }
}
