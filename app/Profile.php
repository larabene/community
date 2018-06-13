<?php

namespace App;

use App\ModelFilters\ProfileFilter;
use App\Rules\Latitude;
use App\Rules\Longitude;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Jedrzej\Sortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Profile extends Model implements HasMediaConversions
{
    use Sluggable, Filterable, SortableTrait, Taggable, HasMediaTrait;

    /**
     * Date Fields.
     *
     * @var array
     */
    protected $dates = ['founded_at', 'created_at', 'updated_at'];

    /**
     * Guarded attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Parameter key to listen for sorting.
     *
     * @var string
     */
    protected $sortParameterName = 'sorteer';

    /**
     * Default Model sorting.
     *
     * @var array
     */
    protected $defaultSortCriteria = ['name,asc'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 400, 400)
            ->performOnCollections('avatars');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the ModelFilter for Profile.
     *
     * @return \EloquentFilter\ModelFilter
     */
    public function modelFilter()
    {
        return $this->provideFilter(ProfileFilter::class);
    }

    /**
     * Return the list of sortable fields.
     *
     * @return array
     */
    public function getSortableAttributes()
    {
        return [
            'name',
            'city',
            'country',
            'highlight',
        ];
    }

    /**
     * Return placeholder if no logo is present.
     *
     * @return string
     */
    public function getLogoAttribute()
    {
        if($this->hasMedia('avatars')) {
            return $this->getFirstMediaUrl('avatars', 'thumb');
        }

        return 'avatar-placeholder.png';
    }

    /**
     * Format the hourly_rate attribute.
     *
     * @param $value
     *
     * @return string
     */
    public function getHourlyRateAttribute($value)
    {
        return $value
            ? format_currency($value)
            : 0;
    }

    /**
     * @param string $year
     */
    public function setFoundedAtAttribute($year)
    {
        if (! empty($year)) {
            $this->attributes['founded_at'] = Carbon::createFromFormat('Y', $year);
        }
    }

    /**
     * @param string $rate
     */
    public function setHourlyRateAttribute($rate)
    {
        $this->attributes['hourly_rate'] = floatval(str_replace([' ', ','], ['', '.'], $rate));
    }

    /**
     * User relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Check for valid coordinates.
     *
     * @return bool
     */
    public function hasCoordinates()
    {
        return Latitude::valid($this->coordinates_lat)
            && Longitude::valid($this->coordinates_lng);
    }
}
