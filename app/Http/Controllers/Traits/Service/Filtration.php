<?php

namespace App\Http\Controllers\Traits\Service;

use Illuminate\Http\Request;

trait Filtration
{
    protected function filterData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterTitleData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('title like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterAuthorData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('author_name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterPublisherData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('publish_name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

    protected function filterTranslatorData($request, $collection)
    {
       
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
       
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('translator_name like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

}
