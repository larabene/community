<?php

use App\Profile;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Support\Collection;

/**
 * Format a valuta.
 *
 * @param $decimal
 *
 * @return string
 */
function format_currency($decimal)
{
    return number_format($decimal, 2, ',', '.');
}

/**
 * Returns the correct action for the global search form.
 */
function search_form_action()
{
    switch (Route::currentRouteName()) {
        case 'guide':
            return route('guide');
        case 'guide.map':
            return route('guide.map');
        case 'guide.list':
        default:
            return route('guide.list');
    }
}

/**
 * Generates the Googlmapper from all profiles.
 *
 * @param Collection $profiles
 */
function render_map(Collection $profiles)
{
    Mapper::map(0, 0, [
        'zoom' => 15,
        'draggable' => true,
        'marker' => false,
        'center' => false,
        'markers' => ['animation' => 'DROP'],
    ]);

    $profiles
        ->filter->hasCoordinates()
        ->each(function (Profile $profile) {
            Mapper::informationWindow($profile->coordinates_lat, $profile->coordinates_lng, $profile->name, [
                'animation' => 'DROP',
                'icon' => '/assets/images/' . ($profile->highlight ? 'marker_highlight.png' : 'marker.png'),
                'eventClick' => 'window.location = "' . route('profile.show', [$profile->slug]) . '";',
                'eventMouseOver' => 'infowindow.setContent("' . $profile->name . '"); infowindow.open(map, this);',
                'eventMouseOut' => 'infowindow.close()',
                'draggable' => false,
            ]);
        });

    return Mapper::render();
}
