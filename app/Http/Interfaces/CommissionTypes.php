<?php


namespace App\Http\Interfaces;


interface CommissionTypes
{

    public function calculate_commission($is_have_orders,$amount);
}
