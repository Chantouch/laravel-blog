<?php

/**
 * Return a formatted Carbon date.
 *
 * @param  Carbon\Carbon $date
 * @param  string $format
 * @return string
 */
function humanize_date(Carbon\Carbon $date, $format = 'd F Y, H:i'): string
{
    return $date->format($format);
}

function active($active): string
{
    if ($active == 1) {
        return "<span class='badge badge-success'>Active</span>";
    } else{
        return "<span class='badge badge-warning'>InActive</span>";
    }
}
