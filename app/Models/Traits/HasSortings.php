<?php

namespace App\Models\Traits;

use App\Acme\Core;

/**
 * each model should define the index of
 * what sorting options it will use ex.
 * protected static $sorting_options = [1, 2, 3].
 *
 * then you can use it like
 * Model::getSortingOptions();
 */
trait HasSortings
{
    protected static function sortingList()
    {
        return [
            '', // ignore
            [
                'title' => __('Recently Added'),
                'sort_by' => 'created_at',
                'sort_dir' => 'desc',
            ], //1
            [
                'title' => __('Title'),
                'sort_by' => 'item_name',
                'sort_dir' => 'asc',
            ], //2
            [
                'title' => __('Code'),
                'sort_by' => 'item_code',
                'sort_dir' => 'asc',
            ], //3
            [
                'title' => __('Type'),
                'sort_by' => 'type_name',
                'sort_dir' => 'asc',
            ], //4
            [
                'title' => 'Category',
                'sort_by' => 'cat_name',
                'sort_dir' => 'asc',
            ], //5
            [
                'title' => __('Author'),
                'sort_by' => 'author_name',
                'sort_dir' => 'asc',
            ], //6
            [
                'title' => __('Publisher'),
                'sort_by' => 'publish_name',
                'sort_dir' => 'asc',
            ], //7
            [
                'title' => __('Translator'),
                'sort_by' => 'translator_name',
                'sort_dir' => 'asc',
            ], //8
        ];
    }

    public static function getSortingOptions($api = false, $sorting_options = [])
    {
        $arr = [];
        $sorting_options = $sorting_options ?: self::$sorting_options;
        foreach ($sorting_options as $index) {
            $arr[] = self::sortingList()[$index];
        }

        // add url key for web
        if (!$api) {
            foreach ($arr as $k => $v) {
                $arr[$k]['url'] = (new Core())->addToCurrentQS([
                    'sort_by' => $v['sort_by'],
                    'sort_dir' => $v['sort_dir'],
                ]);
            }
        }
        return collect($arr);
    }
}
