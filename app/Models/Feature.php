<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'media',
    ];

    public function releases()
    {
        return $this->belongsToMany(Release::class, 'feature_release', 'feature_id', 'release_id')
            ->withTimestamps();
    }
}