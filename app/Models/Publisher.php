<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public function publisherBooks()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id', 'id');
    }
}
