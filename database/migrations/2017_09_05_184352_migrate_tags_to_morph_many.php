<?php

use App\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MigrateTagsToMorphMany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('profile_tag')
            ->get()
            ->groupBy('profile_id')
            ->each(function (Collection $records, int $profileId) {
                $profile = Profile::find($profileId);
                $profile->tags()->sync($records->pluck('tag_id'));
            });
        die;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::truncate('taggables');
    }
}
