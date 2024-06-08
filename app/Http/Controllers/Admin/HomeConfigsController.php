<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\HomeConfigs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\StoreHomeConfigsRequest;
use App\Http\Requests\UpdateHomeConfigsRequest;

class HomeConfigsController extends Controller
{
    public function index()
    {
        $featuredItems = Feature::with('featureable')->orderBy('order')->get();

        return view('pages.home.manager.index', [
            'breadcrumb' => $this->breadcrumb([], 'Home Data'),
            'home' => HomeConfigs::first(),
            'featuredItems' => $featuredItems,
        ]);
    }

    public function update(Request $request)
    {
        $homeData = HomeConfigs::Query()->first();

        if($homeData){
            $homeData->update($request->all());
        }else{
            $homeData = HomeConfigs::create($request->all());
        }
        if ($cover = $request->cover) {
            $homeData->addHashedMedia($cover)->toMediaCollection('cover');
        }

        return $this->returnCrudData('Updated Successfully');
    }

    public function clearCache()
    {
        ini_set('max_execution_time', 600);
        Artisan::call('cache:clear');
        return $this->returnCrudData('Cleared Successfully');
    }
}
