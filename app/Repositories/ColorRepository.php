<?php

namespace App\Repositories;

use App\Models\Color;
use App\Repositories\Contracts\BaseInterfaceRepository;
use App\Repositories\Contracts\ColorInterfaceRepository;

class ColorRepository extends BaseRepository implements ColorInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Color::class);
    }
}
