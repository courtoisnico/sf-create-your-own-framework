<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 12/04/2018
 * Time: 11:36
 */
namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->is_leap_year($year)) {
            return new Response('Yep, this is a leap year');
        }

        return new Response('Nope, this is not a leap year');
    }
}