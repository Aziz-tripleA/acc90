<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class HomeConfigs extends BaseModel implements HasMediaContract
{

    use HasFactory,HasMedia;
    protected $guarded = ['id'];
    
    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }
}
