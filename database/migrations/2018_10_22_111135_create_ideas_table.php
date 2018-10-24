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
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('demographic_id')->nullable();
            $table->unsignedInteger('sec_id')->nullable();
            $table->boolean('existing')->nullable()->default(true);
            $table->text('product_concept')->nullable();
            $table->text('product_description')->nullable();
            $table->text('psychographics')->nullable();
            $table->text('distribution')->nullable();
            $table->text('opportunities')->nullable();
            $table->text('retail_price')->nullable();
            $table->text('competition')->nullable();
            $table->date('target_launch')->nullable();
            $table->boolean('is_kiled')->default(false);
            $table->boolean('is_initial')->default(false);
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
