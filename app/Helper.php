<?php

function rupiah($angka, $prefix = 'Rp ')
{
    $hasil_rupiah = $prefix . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function getUser()
{
    return auth()->user();
}

function dateFormater($date, $format = 'd/m/Y, H:i:s')
{
    return Carbon\Carbon::parse($date)->format($format);
}
