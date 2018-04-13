<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 13/04/2018
 * Time: 15:32
 */

namespace Calendar\Model;


class LeapYear
{
    function is_leap_year($year = null) {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}