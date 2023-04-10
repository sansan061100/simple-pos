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
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
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
