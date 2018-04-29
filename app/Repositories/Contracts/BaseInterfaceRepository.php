<?php

namespace App\Repositories\Contracts;

interface BaseInterfaceRepository
{
    public function create($data);
    public function getAll($attribute);
    public function update($model, $data);
    public function delele($model);
}
