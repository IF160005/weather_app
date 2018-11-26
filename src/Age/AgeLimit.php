<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.26
 * Time: 15.25
 */

namespace App\Age;

class AgeLimit
{
    public function isAdult(int $age)
    {
        return $age >= 18;
    }
}