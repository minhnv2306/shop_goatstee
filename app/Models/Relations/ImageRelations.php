<?php

namespace App\Models\Relations;

trait ImageRelations
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
