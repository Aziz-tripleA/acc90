<?php

namespace App\Http\Controllers;

use App\Models\AboutConfigs;
use App\Models\AbuseNumber;
use App\Models\Ads;
use App\Models\ContactData;
use App\Models\Employee;
use App\Models\FeaturedImage;
use App\Models\Number;
use App\Models\Perpos;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $perposes = Perpos::query()->latest()->paginate(30);
        $abuses = AbuseNumber::query()->latest()->paginate(30);
        $numbers = Number::query()->latest()->paginate(30);
        $employees = Employee::query()->orderBy('created_at')->get();

        return view('pages.pages.about',[
            'perposes'=> $perposes,
            'locale' => request()->session()->get('locale'),
            'image' => AboutConfigs::first()->cover->getUrl(),
            'title' => 'من نحن',
            'abuses'=> $abuses,
            'numbers'=> $numbers,
            'employees'=> $employees,
            'about' => AboutConfigs::first(),
            'breadcrumb' => $this->breadcrumb([], 'من نحن' ,false)
        ]);
    }

    public function contact(){

        $featured = FeaturedImage::where('title','contact')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        return view('pages.pages.contact',[
            'locale' => request()->session()->get('locale'),
            'title' => 'اتصل بنا',
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'breadcrumb' => $this->breadcrumb([], 'اتصل بنا' ,false),
            'contacts' => ContactData::where('order','<',7)->get()->sortBy('order'),
            'map' => ContactData::where('title','الموقع')->first()->value,
        ]);
    }

    public function donate(){
        $featured = FeaturedImage::where('title','donate')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        return view('pages.pages.donate',[
            'locale' => request()->session()->get('locale'),
            'title' => 'لدعم الخدمة',
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'breadcrumb' => $this->breadcrumb([], 'لدعم الخدمة' ,false),
            'transfer' => AboutConfigs::first()->donate
        ]);
    }
}
