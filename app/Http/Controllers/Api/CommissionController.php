<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CommissionRepository;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    //
    private $model;

    public function __construct(CommissionRepository $model)
    {
        $this->model=$model;
    }

    public function index(){

        $data=$this->model->getAll(['*'],[],[]);
        return response($data);
    }



}
