<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use App\Models\Traits\HasMedia;

class Audio extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia;
    protected $guarded = ['id'];

    public function getFileAttribute()
    {
        return $this->getFirstMedia('audio_file');
    }
}
