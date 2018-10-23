<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_order');
            $table->unsignedInteger('stage_id');
            $table->unsignedInteger('substage_id');
            $table->unsignedInteger('action_id');
            $table->unsignedInteger('nextstage_id');
            $table->unsignedInteger('nextsubstage_id');
            $table->unsignedInteger('nextaction_id');
            $table->boolean('active')->default(true)->nullable();
            $table->timestamps();
        });

        Schema::create('workflow_current_role_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('workflow_id');
            $table->string('user_role');
            $table->timestamps();
        });

        Schema::create('workflow_next_role_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('workflow_id');
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
        Schema::dropIfExists('workflow');
        Schema::dropIfExists('workflow_current_role_owners');
        Schema::dropIfExists('workflow_next_role_owners');
    }
}
