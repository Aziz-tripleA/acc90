<?php

namespace App\Models\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\MediaRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * https://docs.spatie.be/laravel-medialibrary/v7/responsive-images/getting-started-with-responsive-images.
 */
trait HasMedia
{
    use InteractsWithMedia;
    public $registerMediaConversionsUsingModelInstance = true;

    /**
     * https://docs.spatie.be/laravel-medialibrary/v710/working-with-media-collections/defining-media-collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
        $this->addMediaCollection('badge')->singleFile();
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('cover_en')->singleFile();
        $this->addMediaCollection('cover_ar')->singleFile();
        $this->addMediaCollection('first_image')->singleFile();
        $this->addMediaCollection('second_image')->singleFile();
        $this->addMediaCollection('third_image')->singleFile();
        $this->addMediaCollection('fourth_image')->singleFile();
        $this->addMediaCollection('pdf_file')->singleFile();
        $this->addMediaCollection('audio_file')->singleFile();
        $this->addMediaCollection('form')->singleFile();
    }


    /**
     * https://docs.spatie.be/laravel-medialibrary/v10/converting-images/defining-conversions.
     *
     * @param Media $media
     */
    public function registerMediaConversions(Media $media = null): void
    {
        // https://docs.spatie.be/laravel-medialibrary/v10/converting-images/defining-conversions/#performing-conversions-on-specific-collections


        $this->addMediaConversion('optimized')
            ->width(800)
            ->withResponsiveImages()
            ->performOnCollections('gallery', 'cover', 'avatar', 'badge')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('small')
            ->width(80)
            ->withResponsiveImages()
            ->performOnCollections('gallery', 'cover')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('medium')
            ->width(260)
            ->withResponsiveImages()
            ->performOnCollections('gallery', 'cover')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('large')
            ->width(360)
            ->withResponsiveImages()
            ->performOnCollections('gallery', 'cover')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            // ->withResponsiveImages()
            ->performOnCollections('gallery', 'avatar', 'badge', 'cover');
    }

    /**
     * away around of having to explicitly
     * set the saved file name of each upload.
     *
     * now just use "addHashedMedia()" instead of the
     * original "addMedia()" and chain like usual
     *
     * @param [type] $file
     * @param mixed $collection_name
     */
    public function addHashedMedia($file, $import = false)
    {
        //dd($file);
        $name = md5(Str::uuid());
        if ($import) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
        } else {
            $ext = $file->getClientOriginalExtension();
        }
        return $this->addMedia($file)
            ->usingName($name)
            ->usingFileName("$name.$ext");
    }

    /**
     * helper to get url for a media instance.
     *
     * @param [type] $item
     * @param mixed $thumb
     * @param mixed $conversion
     */
    public function getUrlFor($item, $conversion = '')
    {
        $media = $this->{$item};

        return $media ? $media->getUrl($conversion) : null;
    }

    /**
     * Get media collection by its collectionName.
     *
     * @param string         $collectionName
     * @param array|callable $filters
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMedia(string $collectionName = 'default', $filters = []):Collection
    {
        return $this->getMediaRepository()
            ->getCollection($this, $collectionName, $filters)
            ->collectionName($collectionName);
    }

    public function getMediaRepository(): MediaRepository
    {
        return app(MediaRepository::class);
    }

}
