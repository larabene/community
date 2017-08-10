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
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            // Belongs To a User
            $table->integer('user_id')->unsigned();

            // Name and Address Fields
            $table->string('name');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');

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
            $table->string('logo');
            $table->date('founded_at');

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
        Schema::dropIfExists('profiles');
    }
}
