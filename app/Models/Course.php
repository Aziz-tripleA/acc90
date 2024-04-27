<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Course extends BaseModel implements HasMediaContract,Searchable
{
    use HasFactory, HasStatus, HasMedia;
    protected $guarded = ['id'];

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

    public function getPdfFileAttribute()
    {
        return $this->getFirstMedia('pdf_file');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('course.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
