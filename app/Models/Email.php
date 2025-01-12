<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'subject',
        'content',
        'folder',
        'starred',
        'deleted',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Email::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Email::class, 'parent_id');
    }

    protected $casts = [
        'parent_id' => 'integer',
        // other casts...
    ];

}
