<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAboutConfigsRequest;
use App\Http\Requests\UpdateAboutConfigsRequest;
use App\Models\AboutConfigs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutConfigsController extends Controller
{
    public function index()
    {
        return view('pages.about.manager.index', [
            'breadcrumb' => $this->breadcrumb([], 'About Data'),
            'about' => AboutConfigs::first(),
        ]);
    }

    public function edit()
    {
        return view('pages.askhelp.manager.edit', [
            'breadcrumb' => $this->breadcrumb([], 'Terms and Conditions'),
            'about' => AboutConfigs::first(),
        ]);
    }

    public function update(Request $request)
    {
        $aboutData = AboutConfigs::Query()->first();

        if($aboutData){
            $aboutData->update($request->all());
        }else{
            $aboutData = AboutConfigs::create($request->all());
        }
        if ($cover = $request->cover) {
            $aboutData->addHashedMedia($cover)->toMediaCollection('cover');
        }
        if ($first_image = $request->first_image) {
            $aboutData->addHashedMedia($first_image)->toMediaCollection('first_image');
        }
        if ($second_image = $request->second_image) {
            $aboutData->addHashedMedia($second_image)->toMediaCollection('second_image');
        }
        if ($third_image = $request->third_image) {
            $aboutData->addHashedMedia($third_image)->toMediaCollection('third_image');
        }
        if ($pdf_file = $request->pdf_file) {
            $aboutData->addHashedMedia($pdf_file)->toMediaCollection('pdf_file');
        }

        return $this->returnCrudData('Updated Successfully');
    }

    public function servants()
    {
        return  redirect('about-us' .'#servants');
    }
}
