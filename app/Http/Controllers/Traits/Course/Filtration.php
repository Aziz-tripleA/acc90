<?php

namespace App\Http\Controllers\Traits\Course;

use Illuminate\Http\Request;

trait Filtration
{
    protected function filterData($request, $collection)
    {
        $status_id = $request->status_id == 'all' ? null : $request->status_id;
        $lecturer = $request->lecturer == 'all' ? null : $request->lecturer;
        $topics = $request->topic == 'all' ? null : $request->topic;
        $featured = null;
        if ($request->filled('featured')) {
            $featured = $request->featured == 'all' ? null : $request->featured == 'Yes';
        }
        $type = $request->type == 'all' ? null : $request->type;
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
        $collection->when($status_id, function ($query) use ($status_id) {
            $query->where('status_id', $status_id);
        });
        $collection->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        });
        if ($featured !== null) {
            $collection->where('featured', $featured);
        }
        if($lecturer){
            $collection->when($lecturer, function ($query) use ($lecturer) {
                return $query->whereHas('lecturer', function ($query) use ($lecturer){
                    $query->where('name',$lecturer);
                });
            });
        }
        $collection->when($topics, function ($query) use ($topics) {
            return $query->whereHas('topic', function ($query) use ($topics){
                $query->where('title',$topics);
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
