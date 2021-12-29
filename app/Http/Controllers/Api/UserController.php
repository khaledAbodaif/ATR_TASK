<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    private $model;

    public function __construct(UserRepository $model)
    {
        $this->model=$model;
    }

    public  function get_user_type($user_id){

        return $this->model->find($user_id,['id','type_id'],['type'],[]);
    }
}
