<?php

namespace Abstract;
use Class\Description;
abstract class People implements Description
{
    public string $name;
    public string $gender;
    public string $workplace;
    public int $age;
    public int $height;
    public float $weight;
    public string $eyes;
    private $normal_weight;

    public function setName(string $name): People
    {
        $this->name = $name;
        return $this;
    }

    public function setWorkplace(string $workplace): People
    {
        $this->workplace = $workplace;
        return $this;
    }

    public function setAge(int $age): People
    {
        $this->age = $age;
        return $this;
    }

    public function setHeight(int $height): People
    {
        $this->height = $height;
        return $this;
    }

    protected function setNormalWeight(int $height, float $weight, string $gender): People
    {
        if ($gender === 'Male'){
            $normal_weight = (($height * 4 / 2.54) - 128)*0.453;
        }
        else if ($gender === 'Female'){
            $normal_weight = (($height * 4 / 2.54) - 108)*0.453;
        }
        else {
            $normal_weight = 0;
        }
        $this->normal_weight = $normal_weight;
        return $this;
    }

    public function setWeight(float $weight): People
    {
        $this->weight = $weight;
        $this->setNormalWeight($this->height, $this->weight, $this->gender);
        $this->difference_weight($this->weight, $this->normal_weight);
        return $this;
    }

    public function setGender(string $gender): People
    {
        $this->gender = $gender;
        return $this;
    }

    private function difference_weight($weight, $normal_weight){
        $this->diff = $weight-$normal_weight;
        return $this;
    }

    public function setEyes(string $eyes): People
    {
        $this->eyes = $eyes;
        return $this;
    }

}
