<?php namespace Michal\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('michal_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('project_name');
            $table->string('customer')->nullable();
            $table->integer('project_manager_id');

            $table->dateTime('due_date')->nullable();

            $table->integer('budget_type')->default(0);
            $table->integer('budget')->default(0);

            $table->boolean('is_completed')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michal_project_projects');
    }
}
