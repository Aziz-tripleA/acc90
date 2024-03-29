<?php

namespace App\Models;

use App\Models\Traits\HasMedia;
use App\Models\Traits\HasSortings;
use App\Models\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Book extends BaseModel implements HasMediaContract
{
    use HasFactory, HasMedia, HasStatus, HasSortings;
    protected $guarded = ['id'];
    protected static $sorting_options = [1, 2, 3, 4, 5, 6, 7, 8];

    public function type()
    {
        return $this->belongsTo(BookType::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class,'cat_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publish_id');
    }

    public function translator()
    {
        return $this->belongsTo(Translator::class);
    }

    public function getCoverAttribute()
    {
        return $this->getFirstMedia('cover');
    }
}
