<?php

function rupiah($angka, $prefix = 'Rp ')
{
    $hasil_rupiah = $prefix . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
