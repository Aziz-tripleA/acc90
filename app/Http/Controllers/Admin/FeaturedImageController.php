<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FeaturedImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeaturedRequest;

class FeaturedImageController extends Controller
{
    public function index()
    {
        return view('pages.featured.manager.index', [
            'breadcrumb' => $this->breadcrumb([], 'Featured Images'),
            'featuredImages' => FeaturedImage::latest()->paginate(10),
        ]);
    }

    public function edit($featuredImage)
    {
        $featured = FeaturedImage::find($featuredImage);
        return view('pages.featured.manager.edit', [
            'breadcrumb' => $this->breadcrumb([], $featured->title),
            'featured' => $featured,
        ]);
    }

    public function update(FeaturedImage $featuredImage, Request $request)
    {

            $featuredImage->update($request->except('cover'));
        if ($cover = $request->cover) {
            $featuredImage->addHashedMedia($cover)->toMediaCollection('cover');
        }
            
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }
}

