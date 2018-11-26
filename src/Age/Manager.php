<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.26
 * Time: 15.26
 */

namespace App\Age;

class Manager
{
    /**
     * @var AgeCalculator
     */
    private $ageCalculator;
    /**
     * @var AgeLimit
     */
    private $ageLimit;

    public function __construct(AgeCalculator $ageCalculator, AgeLimit $ageLimit)
    {
        $this->ageCalculator = $ageCalculator;
        $this->ageLimit = $ageLimit;
    }

    public function getAge(\DateTime $birthDate)
    {
        return $this->ageCalculator->countAge($birthDate);
    }

    public function isAdult(int $age)
    {
        return $this->ageLimit->isAdult($age);
    }

}