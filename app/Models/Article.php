<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;


class Article extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia, HasStatus;
    protected $dates = ['date'];
    protected $guarded = ['id'];
 
    public function topic()
    {
        return $this->belongsTo(ArticlesTopics::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }
}
