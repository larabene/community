<?php

use App\Profile;
use App\Tag;
use App\User;
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
        $tags = factory(Tag::class)->times(6)->create();

        factory(User::class)->times(12)->create()->map(function (User $user) {
            $profile = factory(Profile::class)->make();

            return $user->profiles()->save($profile, [
                'primary' => true,
            ]);
        })->each(function (Profile $profile) use ($tags) {
            $profile->tags()->sync(
                $tags->random(3)
            );
        });
    }
}
