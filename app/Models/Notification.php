<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'type',
        'read_at',
    ];

    protected $dates = [
        'read_at',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
