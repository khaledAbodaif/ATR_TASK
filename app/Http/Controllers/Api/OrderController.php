<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\Patterns\FacadeCommission;
use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //


    private $model;

    public function __construct(OrderRepository $model)
    {
        $this->model=$model;
    }

    public function index(){

        $data=$this->model->getAll(['*'],[],['user']);
        return response($data);

    }

    public function create(OrderRequest $request){

        $inputs=$request->validated();

        $data=$this->model->create($inputs);

        $is_have_orders=$this->get_order_count($data['data']['user_id']);

        $commission_inputs=[
            'user_id'=>$data['data']['user_id'],
            'order_id'=>$data['data']['id'],
        ];

        $commission=new FacadeCommission();
        $data['commission']=$commission->build($data['data']['user_id'],$is_have_orders,$data['data']['amount'],$commission_inputs);

        return response($data);
    }

    public function get_order_count($user_id){

        $data=$this->model->getAll(['id'],[['user_id',$user_id]],[]);

        return $data['data']->count() > 1?true:false;
    }

}
