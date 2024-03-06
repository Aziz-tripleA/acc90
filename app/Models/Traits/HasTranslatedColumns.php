<?php

namespace App\Models\Traits;

use Spatie\Translatable\HasTranslations;

trait HasTranslatedColumns
{
    use HasTranslations;

    /**
     * get around saving empty translation.
     *
     * @return void
     */
    public static function bootHasTranslatedColumns()
    {
        static::saving(function ($model) {
            $translations = $model->getTranslations();

            foreach ($translations as $key => $values) {
                foreach ($values as $locale => $value) {
                    if (empty($value) && $value != 0) {
                        $model->forgetTranslation($key, $locale);
                    }
                }
            }
        });
    }
}
