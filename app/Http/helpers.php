<?php

/**
 * Format a valuta.
 *
 * @param $decimal
 * @return string
 */
function format_valuta($decimal)
{
    return number_format($decimal, 2, ",", ".");
}

/**
 * Returns the correct action for the global search form
 */
function search_form_action()
{
    switch(Route::currentRouteName())
    {
        case 'guide':return route('guide');break;
        case 'guide.map':return route('guide.map');break;
        case 'guide.list':
        default:return route('guide.list');break;
    }
}