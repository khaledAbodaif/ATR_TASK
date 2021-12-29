<?php


namespace App\Http\Classes\Patterns;


use App\Http\Classes\CommissionTypes\Free;
use App\Http\Classes\CommissionTypes\Premium;
use App\Http\Interfaces\CommissionTypes;
use App\Http\Repositories\CommissionRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Commission;
use App\Models\User;

class FacadeCommission
{

    private CommissionTypes $type;
    public function build($user_id,$is_have_orders,$amount,$inputs){

        $user=new UserRepository(new User());
        $user=$user->find($user_id,['id','type_id'],['type'],[]);


        $type_factory= new FactoryType();
        $this->type=$type_factory->choose_type($user['type'],$user['type']['first_order'], $user['type']['second_order']);
        $inputs['commission_value'] = $this->type->calculate_commission($is_have_orders, $amount);



        $commission = new CommissionRepository(new Commission());
        return $commission->create($inputs);



    }
}
