<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use Spatie\Searchable\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Spatie\Searchable\SearchResult;


class Article extends BaseModel implements HasMediaContract , Searchable
{
    use HasFactory, HasMedia, HasStatus ;
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

    public function getSearchResult(): SearchResult
    {
        $url = route('article.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
    public function features()
    {
        return $this->morphMany(Feature::class, 'featureable');
    }
}
