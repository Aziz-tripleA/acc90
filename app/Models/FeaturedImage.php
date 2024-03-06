<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class FeaturedImage extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia;
    protected $guarded = ['id'];

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }
}
