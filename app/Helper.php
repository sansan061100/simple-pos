<?php

function rupiah($number, $prefix = 'Rp ')
{
    $rupiah = $prefix . number_format($number, 0, '', '.');
    return $rupiah;
}

function getUser()
{
    return auth()->user();
}

function dateFormater($date, $format = 'd/m/Y, H:i:s')
{
    return Carbon\Carbon::parse($date)->format($format);
}

function allMonths()
{
    return [
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    ];
}

function allYears($year = 2023, $previous = 0, $next = 0)
{
    $years = [];
    for ($i = $year; $i >= $year - $previous; $i--) {
        $years[$i] = $i;
    }

    for ($i = $year + 1; $i <= $year + $next; $i++) {
        $years[$i] = $i;
    }

    // sort by key
    ksort($years);
    return $years;
}

function listColor()
{
    return [
        '#2ecc71',
        '#3498db',
        '#9b59b6',
        '#34495e',
        '#f1c40f',
        '#e67e22',
        '#e74c3c',
        '#95a5a6',
        '#1abc9c',
        '#16a085',
    ];
}
