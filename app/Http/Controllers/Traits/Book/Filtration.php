<?php

namespace App\Http\Controllers\Traits\Book;

use Illuminate\Http\Request;

trait Filtration
{
    protected function filterData($request, $collection)
    {
        $status_id = $request->status_id == 'all' ? null : $request->status_id;
        $author = $request->author == 'all' ? null : $request->author;
        $author_name = $request->author_name == 'all' ? null : $request->author_name;
        $cat = $request->cat == 'all' ? null : $request->cat;
        $cat_name = $request->cat_name == 'all' ? null : $request->cat_name;
        $type = $request->type == 'all' ? null : $request->type;
        $publisher = $request->publisher == 'all' ? null : $request->publisher;
        $publish_name = $request->publish_name == 'all' ? null : $request->publish_name;
        $translator = $request->translator == 'all' ? null : $request->translator;
        $translator_name = $request->translator_name == 'all' ? null : $request->translator_name;
        $featured = null;
        if ($request->filled('featured')) {
            $featured = $request->featured == 'all' ? null : $request->featured == 'Yes';
        }
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
        $collection->when($status_id, function ($query) use ($status_id) {
            $query->where('status_id', $status_id);
        });
        if ($featured !== null) {
            $collection->where('featured', $featured);
        }

        $collection->when($author, function ($query) use ($author) {
                $query->where('author_id',$author);
        });

        $collection->when($author_name, function ($query) use ($author_name) {
            return $query->whereHas('author', function ($query) use ($author_name){
                $query->where('author_name',$author_name);
            });
        });

        $collection->when($publisher, function ($query) use ($publisher) {
                $query->where('publish_id',$publisher);
        });

        $collection->when($publish_name, function ($query) use ($publish_name) {
            return $query->whereHas('publisher', function ($query) use ($publish_name){
                $query->where('publish_name',$publish_name);
            });
        });

        $collection->when($translator, function ($query) use ($translator) {
                $query->where('translator_id',$translator);
        });

        $collection->when($translator_name, function ($query) use ($translator_name) {
            return $query->whereHas('translator', function ($query) use ($translator_name){
                $query->where('translator_name',$translator_name);
            });
        });

        $collection->when($cat, function ($query) use ($cat) {
                $query->where('cat_id',$cat);
        });

        $collection->when($cat_name, function ($query) use ($cat_name) {
            return $query->whereHas('category', function ($query) use ($cat_name){
                $query->where('cat_name',$cat_name);
            });
        });

        $collection->when($type, function ($query) use ($type) {
            return $query->whereHas('type', function ($query) use ($type){
                $query->whereRaw('type_name like "%' . strtolower($type) . '%"');
            });
        });

        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('item_name like "%' . strtolower($title) . '%"');  
                $query->orWhere('item_code',$title);  
                $query->orWhereHas('category', function ($query) use ($title){
                    $query->whereRaw('cat_name like "%' . strtolower($title) . '%"');
                });
                $query->orWhereHas('author', function ($query) use ($title){
                    $query->whereRaw('author_name like "%' . strtolower($title) . '%"');
                });
                $query->orWhereHas('translator', function ($query) use ($title){
                    $query->whereRaw('translator_name like "%' . strtolower($title) . '%"');
                });
                $query->orWhereHas('publisher', function ($query) use ($title){
                    $query->whereRaw('publish_name like "%' . strtolower($title) . '%"');
                });
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterTypeData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('type_name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterCategoryData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('cat_name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

}
