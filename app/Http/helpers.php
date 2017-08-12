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