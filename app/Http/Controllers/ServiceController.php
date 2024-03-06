<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * services index.
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request, $service='')
    {
        $services = Service::query()->get();
        $featured = FeaturedImage::where('title','services')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }

        $featuredForValues = FeaturedImage::where('title','values')->first();
        $imgValues ='';
        if($featuredForValues){
            $imgValues = $featuredForValues->cover?$featuredForValues->cover->getUrl():'';
        }
        $values = Value::query()->get();
        return view('pages.services.index', [
            'services' => $services,
            'selected_service'=>$service,
            'title' => 'خدماتنا',
            'locale' => request()->session()->get('locale'),
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'values_image' => $imgValues?:asset('assets/images/backgrounds/img1.jpg'),
            'values' => $values,
            'breadcrumb' => $this->breadcrumb([], 'خدماتنا' ,false)
        ]);
    }

    /**
     * show Service.
     *
     * @param Request $request
     * @param Service $service
     */
    public function show(Request $request,Service $service)
    {

        return view('welcome', [
            'locale' => request()->session()->get('locale'),
            'Service' => $service,
        ]);

    }
}
