<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProfileFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * Wildcard string filter.
     *
     * @param mixed $string
     *
     * @return $this
     */
    public function find($string)
    {
        return $this->where(function ($q) use ($string) {
            return $q->where('name', 'LIKE', "%$string%")
                ->orWhere('city', 'LIKE', "%$string%")
                ->orWhere('about', 'LIKE', "%$string%")
                ->orWhere('intro', 'LIKE', "%$string%");
        });
    }
}
