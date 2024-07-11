<?php

namespace Abstract;

class Ivan extends People
{
    public const SALARY = 3000;
}

$Ivan = new Ivan();
$Ivan->setName('Ivan')->setAge(18)->setGender('Male')->setHeight(183)->setWeight(68)
    ->setWorkplace('none')->setEyes('Blue');
var_dump($Ivan);