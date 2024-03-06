<?php

namespace App\Http\Controllers\Traits\Article;

use Illuminate\Http\Request;

trait Filtration
{
    protected function filterData($request, $collection)
    {
        $status_id = $request->status_id == 'all' ? null : $request->status_id;
        $writers = $request->writer == 'all' ? null : $request->writers;
        $writer = $request->writer == 'all' ? null : $request->writer;
        $type = $request->type == 'all' ? null : $request->type;
        $topics = $request->topic == 'all' ? null : $request->topics;
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
        if($writers){
            $collection->when($writers, function ($query) use ($writers) {
                return $query->whereHas('writer', function ($query) use ($writers){
                    $query->whereIn('name',$writers);
                });
            });
        }
        if($writer){
            $collection->when($writer, function ($query) use ($writer) {
                return $query->whereHas('writer', function ($query) use ($writer){
                    $query->where('id',$writer);
                });
            });
        }
        $collection->when($topics, function ($query) use ($topics) {
            return $query->whereHas('topic', function ($query) use ($topics){
                $query->whereIn('title',$topics);
            });
        });

        $collection->when($type, function ($query) use ($type) {
            return $query->whereHas('topic', function ($query) use ($type){
                $query->where('id',$type);
            });
        });

        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('title like "%' . strtolower($title) . '%"');    
            });
        });
        // dd($collection->toSql());

        return $collection;
    }

}
