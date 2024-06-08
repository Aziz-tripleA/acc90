<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Ads extends BaseModel implements HasMediaContract , Searchable
{
    use HasFactory,HasStatus,HasMedia;
    protected $guarded = ['id'];
    protected $casts = ['is_featured' => 'boolean'];

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('ads.show', $this->id);

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
