<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 12/04/2018
 * Time: 11:36
 */

use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function indexAction($request)
    {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year');
        }

        return new Response('Nope, this is not a leap year');
    }
}