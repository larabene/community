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
            $table->string('slug');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('highlight')->default(0);
            $table->tinyInteger('available')->default(1);

            // Name and Address Fields
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            // Coordinates for Google Maps
            $table->string('coordinates_lat')->nullable();
            $table->string('coordinates_lng')->nullable();

            // Contact Fields
            $table->string('website')->nullable();
            $table->string('emailaddress')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();

            // Invoice Fields
            $table->string('company_number')->nullable();
            $table->string('vat_number')->nullable();

            // Social Media Fields
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('googleplus')->nullable();

            // Other Fields
            $table->string('intro')->nullable();
            $table->text('about')->nullable();
            $table->decimal('hourly_rate')->nullable();
            $table->string('logo')->nullable();
            $table->date('founded_at')->nullable();

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
