<?php

namespace App\Console\Commands;

use App\Profile;
use Illuminate\Console\Command;

class MoveAvatarsToMediaLibrary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move:avatars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moves avatars to Media Library';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach(Profile::all() as $profile) {
            if(!is_null($profile->getOriginal('logo'))) {

                $oldAvatarPath = storage_path('app/public/uploads/logos/' . $profile->getOriginal('logo'));

                if(file_exists($oldAvatarPath)) {
                    $profile->clearMediaCollection('avatars');
                    $profile->addMedia($oldAvatarPath)
                        ->setName("$profile->slug avatar")
                        ->setFileName($profile->slug . ".png")
                        ->toMediaCollection('avatars');
                }
            }
        }
    }
}
