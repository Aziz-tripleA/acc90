<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class AboutConfigs extends BaseModel implements HasMediaContract
{

    use HasFactory,HasMedia;
    protected $guarded = ['id'];
    
    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }

    public function getFirstImageAttribute()
    {
        return $this->getFirstMedia('first_image');
    }

    public function getSecondImageAttribute()
    {
        return $this->getFirstMedia('second_image');
    }

    public function getThirdImageAttribute()
    {
        return $this->getFirstMedia('third_image');
    }

    public function getPdfFileAttribute()
    {
        return $this->getFirstMedia('pdf_file');
    }

}
