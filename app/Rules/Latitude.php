<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Latitude implements Rule
{
    const PATTERN = "/^-?([1-8]?[0-9]|[1-9]0)\.{1}\d{1,6}$/";

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function valid($value): bool
    {
        return preg_match(self::PATTERN, $value) === 1;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return self::valid($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid latitude value';
    }
}
