<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class EducationalMaterials extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia;
    protected $guarded = ['id'];

    public $display_modes = [
        'audio'=>'محاضرة مسموعة',
        'video'=>'محاضرة فيديو',
        'text'=>'محاضرة مقرؤة'
        ];

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }

    public function topic()
    {
        return $this->belongsTo(ArticlesTopics::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
