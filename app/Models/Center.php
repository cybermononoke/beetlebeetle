<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = ['name', 'address'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
