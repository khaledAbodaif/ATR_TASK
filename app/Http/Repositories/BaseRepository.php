<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseRepository implements RepositoryInterface
{

    //@var model
    protected $model;
    public $order='asc';
    public $orderBy='created_at';
    private  $returnedMessage=['status'=>'success','message'=>'Great Work','data'=>''];
    /*
     * BaseRepository constructor
     * assign any model to the protected var
     * */
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    /*
     * @param columns ,array with entities you want from a table
     * @param relations ,if you want get joined tables
     * @param appends ,if you want to show any data with the request
     * return message if [] else date
     * */
    public function getAll(array $columns=['*'],array $conditions=[],array $relations=[])
    {
       $data=$this->model
           ->with($relations)
           ->where($conditions)
           ->orderBy($this->orderBy,$this->order)
           ->get($columns);
       if ($data->count()>0)
        $this->returnedMessage['data']=$data;
       else
           $this->returnedMessage['message']="there is no data available yet!";
        return $this->returnedMessage;
    }
    /*
       * @param model_id the model id that you want
       * @param columns ,array with entities you want from a table
       * @param relations ,if you want get joined tables
       * @param appends ,if you want to show any data with the request
       * return message if [] else date
       * */
    public function find($model_id,array $columns=['*'],array $relations=[],array $appends=[])
    {
        try
        {
           return $this->model->select($columns)->with($relations)->findOrFail($model_id)->append($appends);
        }
        catch(ModelNotFoundException $e)
        {
            return false;
        }


    }

    public function create(array $request)
    {

        try {
            $this->returnedMessage['data']=$this->model->create($request)->fresh();
        }
        catch(\Exception $e)
        {
            $this->returnedMessage['status']='error';
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;
    }

    public function update(array $request,$id)
    {
        try {
            $model = $this->model->findOrFail($id);
            $this->returnedMessage['data']= $model->update($request);
        }
        catch(\Exception $e)
        {

            $this->returnedMessage['status']='error';
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;

    }

    public function delete($id)
    {
        try {
            $model = $this->model->findOrFail($id);
            $this->returnedMessage['data']= $model->delete();
        }
        catch(\Exception $e)
        {

            $this->returnedMessage['status']='error';
            $this->returnedMessage['message']=$e->getMessage();
        }
        return $this->returnedMessage;
    }

}
