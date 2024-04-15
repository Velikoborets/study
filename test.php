<?php

    $date = '1997-24-06';
    $arr = explode('-', $date);
    list($year, $day, $month) = $arr;
    $res_date = $day . '-' . $month . '-' . $year;
    print_r($res_date);


