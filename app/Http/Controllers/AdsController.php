<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::query()->IsActive()->latest()->paginate(30);
        $featured = FeaturedImage::where('title','announcement')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        return view('pages.ads.index',[
            'locale' => request()->session()->get('locale'),
            'ads'=> $ads,
            'title' => 'إعلانات',
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'breadcrumb' => $this->breadcrumb([], 'إعلانات' ,false)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($ads)
    {
        $ad = Ads::find($ads);

        return view('pages.ads.show',
            [
                'ad'=>$ad,
                'locale' => request()->session()->get('locale'),
                'image'=> $ad->getUrlFor('cover'),
                'title' => 'إعلانات',
                'breadcrumb' => $this->breadcrumb([
                    [
                        'title' => 'إعلانات',
                        'route' => route('ads.index')
                    ]
                ]
                , $ad->title ,false) 
            ]);
    }
}
