<?php

class Bill
{
    public int $bill_number;
    public $bill_date;
    public int $total;
    public int $price;
    public int $qt;

    public function calcul($qt, $price)
    {
        $this->total = $this->qt * $this->price;
    }
}
