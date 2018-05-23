<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    const READ = 1;
    const UN_READ = 0;

    protected $guarded = [
        'id'
    ];
    /**
     * Get all of the owning commentable models.
     */
    public function objectable()
    {
        return $this->morphTo();
    }
}
