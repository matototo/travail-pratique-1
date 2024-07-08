<?php

class Automobile
{
    public string $serial_number;
    public string $name;
    public $date;
    public string $drive_train;
    public string $category;
    public string $type;
    public int $price;
    public string $description;
    public int $cost;
    public int $benefit;

    public function currentBenefit($price, $cost)
    {
        $this->benefit = $this->price - $this->cost;
    }
}
