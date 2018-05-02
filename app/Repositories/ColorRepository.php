<?php

namespace App\Repositories;

use App\Models\Color;
use App\Repositories\Contracts\BaseInterfaceRepository;

class ColorRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Color::class);
    }
}
