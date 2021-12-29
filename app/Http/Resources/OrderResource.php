<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $data=$this['data'];
        return [
            'status'=>$this['status'],
            'message'=>$this['message'],
            'order'=>[
                'id'=>$data->id,
                'amount'=> $data->amount,
                'user'=>[
                    'id'=>$data->user->id,
                    'username'=>$data->user->username,
                    'type_name'=>$data->user->type->name,
                ]
            ],

        ];
    }
}
