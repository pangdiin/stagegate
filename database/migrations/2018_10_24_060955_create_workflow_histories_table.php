<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('workflow_id');
            $table->unsignedInteger('stage_id');
            $table->unsignedInteger('substage_id');
            $table->unsignedInteger('action_id');
            $table->unsignedInteger('nextstage_id');
            $table->unsignedInteger('nextsubstage_id');
            $table->unsignedInteger('nextaction_id');
            $table->timestamps();
        });

         Schema::create('workflow_history_owner', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('workflow_history_id');
            $table->string('user_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workflow_histories');
        Schema::dropIfExists('workflow_history_owner');
    }
}
