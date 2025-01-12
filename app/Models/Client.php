<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name'];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
