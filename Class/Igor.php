<?php

namespace Abstract;

class Igor extends People
{
    public const SALARY = 1500;
}

$Igor = new Igor();
$Igor->setName('Igor')->setAge(19)->setGender('Male')->setHeight(185)->setWeight(73)
    ->setWorkplace('PizzaTempo')->setEyes('Green');
var_dump($Igor);
