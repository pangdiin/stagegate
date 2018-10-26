<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('workflow_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('demographic_id')->nullable();
            $table->boolean('existing')->nullable()->default(true);
            $table->text('product_concept')->nullable();
            $table->text('product_description')->nullable();
            $table->text('psychographics')->nullable();
            $table->text('opportunities')->nullable();
            $table->text('retail_price')->nullable();
            $table->text('competition')->nullable();
            $table->date('target_launch')->nullable();
            $table->boolean('is_kiled')->default(false)->nullable();
            $table->boolean('is_initial')->default(false)->nullable();
            $table->timestamps();
        });

        Schema::create('idea_secs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('sec_id');
            $table->timestamps();
        });

        Schema::create('idea_distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('distribution_id');
            $table->timestamps();
        });

        Schema::create('idea_sources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::create('idea_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idea_id');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('ideas');
        Schema::dropIfExists('idea_sources');
        Schema::dropIfExists('idea_owners');
    }
}
