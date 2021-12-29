<?php


namespace App\Http\Classes\CommissionTypes;


use App\Http\Interfaces\CommissionTypes;

class Premium implements CommissionTypes
{
    private $first_commission;
    private $other_commission;

    public function __construct($first_commission,$other_commission)
    {
        $this->first_commission=$first_commission;
        $this->other_commission=$other_commission;

    }



    public function calculate_commission($is_have_orders,$amount)
    {
        if ($is_have_orders)
            return ($this->other_commission / 100 )* $amount;
        else
            return ($this->first_commission / 100 )* $amount;


    }

}
