<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Release extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'version',
        'release_date',
        'media',
        'link',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_release', 'release_id', 'feature_id')
            ->withTimestamps();
    }
}
