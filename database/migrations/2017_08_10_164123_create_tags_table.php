<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tags table
         */
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tag');
            $table->string('color');

            $table->timestamps();
        });

        /**
         * Pivot table Profile <-> Tag
         */
        Schema::create('profile_tag', function(Blueprint $table) {
            $table->integer('profile_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('profile_tag');
    }
}
