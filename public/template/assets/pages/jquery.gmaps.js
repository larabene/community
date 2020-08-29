/**
 * Theme: Adminto Admin Template
 * Author: Coderthemes
 * Google Maps
 */

!function ($) {
    "use strict";

    var GoogleMap = function () {
    };

    //creates map with markers
    GoogleMap.prototype.createMarkers = function ($container) {
        var map = new GMaps({
            div: $container
        });

        if ($('.marker').length > 0) {
            $('.marker').each(function (i, marker) {
                map.addMarker({
                    lat: $(marker).attr('data-lat'),
                    lng: $(marker).attr('data-lng'),
                    title: $(marker).attr('data-name'),
                    click: function () {
                        window.location($(marker).attr('data-url'));
                    }
                });
            });
        }

        return map;
    },

    //init
    GoogleMap.prototype.init = function () {
        var $this = this;
        $(document).ready(function () {
            $this.createMarkers('#gmaps-markers');
        });
    },

    //init
    $.GoogleMap = new GoogleMap, $.GoogleMap.Constructor = GoogleMap
}(window.jQuery),

//initializing 
function ($) {
    "use strict";
    $.GoogleMap.init()
}(window.jQuery);