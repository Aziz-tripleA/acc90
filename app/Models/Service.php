<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Service extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia, HasStatus;
    protected $guarded = ['id'];
    protected $casts = ['is_featured' => 'boolean'];

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }
}