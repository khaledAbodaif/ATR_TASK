<?php


namespace App\Http\Classes\Patterns;


use App\Http\Classes\CommissionTypes\Free;
use App\Http\Classes\CommissionTypes\Premium;

class FactoryType
{

    public function choose_type($type,$first_commission,$second_commission){


        if ( $type['name'] == 'Free') {
            return new Free($first_commission,$second_commission);

        }else {

            return new Premium($first_commission,$second_commission);
        }

    }

}
