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
            $table->tinyInteger('highlight')->default(0);
            $table->tinyInteger('available')->default(1);

            // Name and Address Fields
            $table->string('name');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');

            // Coordinates for Google Maps
            $table->string('coordinates_lat');
            $table->string('coordinates_lng');

            // Contact Fields
            $table->string('emailaddress');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('whatsapp');

            // Invoice Fields
            $table->string('company_number');
            $table->string('vat_number');

            // Social Media Fields
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
            $table->string('googleplus');

            // Other Fields
            $table->decimal('hourly_rate');
            $table->string('logo');
            $table->date('founded_at');

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
