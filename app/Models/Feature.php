<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = ['featureable_type', 'featureable_id', 'order'];

    public function featureable()
    {
        return $this->morphTo();
    }
    public function featureableUrl() {
        if ($this->featureable_type == Book::class) {
            return route('book.show', $this->featureable->slug);
        } elseif ($this->featureable_type == Service::class) {
            return route('service.index',  $this->featureable->title);
        } elseif ($this->featureable_type == Ads::class) {
            return route('ads.show',  $this->featureable_id);
        } elseif ($this->featureable_type == Article::class) {
            return route('article.show',  $this->featureable->slug);
        }
        // Add more conditions if you have more polymorphic types
        return '#';
    }
}
