<?php

namespace App\Http\Controllers\Traits\AskHelp;

use Illuminate\Http\Request;

trait Filtration
{
    protected function filterData($request, $collection)
    {
        $gender = $request->gender;
        $time = $request->time;
        $day = $request->day;
        $city = $request->city;
        
        // Common
        $title = str_replace('"', '\"', $request->q);
        $title = str_replace("'", "\'", $title);
        $title = str_replace("%", "\'", $title);
        
        
        $collection->when($gender, function ($query) use ($gender) {
            return $query->where('humanType',$gender); 
        });
        $collection->when($time, function ($query) use ($time) {
            return $query->where('time',$time); 
        });
        $collection->when($city, function ($query) use ($city) {
            return $query->where('city',$city); 
        });
        $collection->when($day, function ($query) use ($day) {
            return $query->where('day',$day); 
        });
        $collection->when($title, function ($query) use ($title) {
            return $query->where(function ($query) use ($title) {
                $query->whereRaw('fullname like "%' . strtolower($title) . '%"');    
                $query->whereRaw('email like "%' . strtolower($title) . '%"');    
                $query->whereRaw('mobile like "%' . strtolower($title) . '%"');    
                $query->whereRaw('age like "%' . strtolower($title) . '%"');    
                $query->whereRaw('humanType like "%' . strtolower($title) . '%"');    

            });
        });
        // dd($collection->toSql());

        return $collection;
    }

}
