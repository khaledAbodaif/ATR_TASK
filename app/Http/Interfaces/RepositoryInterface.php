<?php
namespace App\Http\Interfaces;


interface RepositoryInterface
{
    public function getAll(array $columns=['*'],array $relations=[]);

    public function find($model_id,array $columns=['*'],array $relations=[]);

    public function create(array $request);

    public function update(array $request, $id);

    public function delete($id);
}