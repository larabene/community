<?php

use App\Profile;
use App\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Profile::class)
            ->times(12)
            ->create()
            ->each(function (Profile $profile) {
                $tags = factory(Tag::class)->times(3)->create();
                $profile->tags()->attach(
                    $tags->modelKeys()
                );
            });
    }
}
