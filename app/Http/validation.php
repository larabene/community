<?php

// Validato Latitude rule
Validator::extend('lat', function ($attribute, $value, $parameters, $validator) {
    return isValidLatitude($value);
});

// Validate Longitude rule
Validator::extend('lng', function ($attribute, $value, $parameters, $validator) {
    return isValidLongitude($value);
});
