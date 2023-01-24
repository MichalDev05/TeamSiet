<?php namespace Michal\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectAccountantsTable extends Migration
{
    public function up()
    {
        Schema::create('michal_project_accountants', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->primary(['user_id', 'project_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('michal_project_accountants');
    }
}
