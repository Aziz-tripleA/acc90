<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::query()->latest()->paginate(30);
        $featured = FeaturedImage::where('title','testimonials')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        return view('pages.testimonials.index',[
            'locale' => request()->session()->get('locale'),
            'title' => 'الاختبارات',
            'testimonials'=> $testimonials,
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
        ]);
    }
}
