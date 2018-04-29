<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseInterfaceRepository;

abstract class BaseRepository implements BaseInterfaceRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $modelInstance = $this->model;
        $modelInstance::create($data);
    }

    public function getAll($atrribute)
    {
        $modelInstance = $this->model;
        return $modelInstance::get($atrribute);
    }

    public function update($model, $data)
    {
        $model->update($data);
    }

    public function delele($model)
    {
        $model->delete();
    }
}
