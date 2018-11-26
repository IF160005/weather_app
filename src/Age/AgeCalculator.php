<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.26
 * Time: 15.25
 */

namespace App\Age;

class AgeCalculator
{

    public function countAge(\DateTime $birthday)
    {
        $today= new \DateTime;
        return $today->diff($birthday)->y;

    }
}