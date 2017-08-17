<?php

namespace App;

use App\ModelFilters\ProfileFilter;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Jedrzej\Sortable\SortableTrait;

class Profile extends Model
{
    use Sluggable, Filterable, SortableTrait;

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
    protected $fillable = [
        'available', 'name', 'address', 'zipcode', 'city',
        'country', 'coordinates_lat', 'coordinates_lng',
        'website', 'emailaddress', 'telephone', 'mobile',
        'whatsapp', 'company_number', 'vat_number', 'facebook',
        'linkedin', 'twitter', 'googleplus', 'intro', 'about',
        'hourly_rate', 'founded_at'
    ];

    /**
     * Parameter key to listen for sorting.
     *
     * @var string
     */
    protected $sortParameterName = 'sorteer';

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
     * Default Model sorting.
     *
     * @var array
     */
    protected $defaultSortCriteria = ['name,asc'];

    /**
     * Return the list of sortable fields.
     *
     * @return array
     */
    public function getSortableAttributes()
    {
        return ['name', 'city', 'country', 'highlight'];
    }

    /**
     * Return placeholder if no logo is present.
     *
     * @param $value
     *
     * @return string
     */
    public function getLogoAttribute($value)
    {
        return is_null($value) ? 'placeholder.png' : $value;
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
        if (is_null($value)) {
            return 0;
        } else {
            return format_valuta($value);
        }
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
     * Owner (User) relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Tag relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Check for valid coordinates.
     *
     * @return bool
     */
    public function hasCoordinates()
    {
        return isValidLatitude($this->coordinates_lat) && isValidLongitude($this->coordinates_lng);
    }
}
