<?php


namespace App\Http\Repositories;

use App\Models\Commission;
use App\Models\User;


class CommissionRepository extends BaseRepository
{

    public function __construct(Commission $model)
    {
        parent::__construct($model);
    }


}
