<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use App\Models\Traits\HasMedia;

class CounselingType extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia;
    protected $guarded = ['id'];

    public function getFormAttribute()
    {
        return $this->getFirstMedia('form');
    }
}
