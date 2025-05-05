<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tag');
    }
}
