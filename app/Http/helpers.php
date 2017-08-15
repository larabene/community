<?php

/**
 * Format a valuta.
 *
 * @param $decimal
 *
 * @return string
 */
function format_valuta($decimal)
{
    return number_format($decimal, 2, ',', '.');
}

/**
 * Returns the correct action for the global search form.
 */
function search_form_action()
{
    switch (Route::currentRouteName()) {
        case 'guide':return route('guide'); break;
        case 'guide.map':return route('guide.map'); break;
        case 'guide.list':
        default:return route('guide.list'); break;
    }
}

/**
 * Generates the Googlmapper from all profiles.
 *
 * @param $profiles
 */
function createGoogleMap($profiles)
{
    \Mapper::map(0, 0,
        [
            'zoom'      => 15,
            'draggable' => true,
            'marker'    => false,
            'center'    => false,
            'markers'   => ['animation' => 'DROP'],
        ]);

    foreach ($profiles as $profile) {
        if ($profile->hasCoordinates()) {
            \Mapper::informationWindow($profile->coordinates_lat, $profile->coordinates_lng,
                $profile->name, [
                    'animation'      => 'DROP',
                    'icon'           => '/assets/images/' . ($profile->highlight == 1 ? 'marker_highlight.png' : 'marker.png'),
                    'eventClick'     => 'window.location = "'.route('profile.show', [$profile->slug]).'";',
                    'eventMouseOver' => 'infowindow.setContent("'.$profile->name.'"); infowindow.open(map, this);',
                    'eventMouseOut'  => 'infowindow.close()',
                    'draggable'      => false
                ]
            );
        }
    }
}

/**
 * Function to validate latitude.
 *
 * @param $latitude
 *
 * @return bool
 */
function isValidLatitude($latitude)
{
    return preg_match("/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/", $latitude) == 1;
}

/**
 * Function to validate longitude.
 *
 * @param $longitude
 *
 * @return bool
 */
function isValidLongitude($longitude)
{
    return preg_match("/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/", $longitude) == 1;
}
