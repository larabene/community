<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Profiles table
         */
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('highlight')->default(0);
            $table->tinyInteger('available')->default(1);

            // Name and Address Fields
            $table->string('name');
            $table->string('address')->nullabled();
            $table->string('zipcode')->nullabled();
            $table->string('city')->nullabled();
            $table->string('country')->nullabled();

            // Coordinates for Google Maps
            $table->string('coordinates_lat')->nullabled();
            $table->string('coordinates_lng')->nullabled();

            // Contact Fields
            $table->string('website')->nullabled();
            $table->string('emailaddress')->nullabled();
            $table->string('telephone')->nullabled();
            $table->string('mobile')->nullabled();
            $table->string('whatsapp')->nullabled();

            // Invoice Fields
            $table->string('company_number')->nullabled();
            $table->string('vat_number')->nullabled();

            // Social Media Fields
            $table->string('facebook')->nullabled();
            $table->string('linkedin')->nullabled();
            $table->string('twitter')->nullabled();
            $table->string('googleplus')->nullabled();

            // Other Fields
            $table->text('about')->nullabled();
            $table->decimal('hourly_rate')->nullabled();
            $table->string('logo')->nullabled();
            $table->date('founded_at')->nullabled();

            // Timestamps
            $table->timestamps();
        });

        /**
         * Pivot table Profile <-> User
         */
        Schema::create('profile_user', function(Blueprint $table) {
            $table->integer('profile_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('primary')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('profile_user');
    }
}
