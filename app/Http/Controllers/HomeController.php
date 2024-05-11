<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Book;
use App\Models\User;
use App\Models\Course;
use App\Models\Article;
use App\Models\Service;
use App\Models\Employee;
use App\Models\ContactData;
use App\Models\HomeConfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index(Request $request)
    {
//        if (!Cache::has('featured_ads')) {
//            Cache::remember('featured_ads', 5 * 60 * 60, function () {
//                return Ads::with('media')->where('is_featured',1)->orderBy('home_order')->get();
//            });
//        }
//        if (!Cache::has('featured_services')) {
//            Cache::remember('featured_services', 5 * 60 * 60, function () {
//                return Service::with('media')->where('is_featured',1)->orderBy('home_order')->get();
//            });
//        }
//        if (!Cache::has('employees')) {
//            Cache::remember('employees', 5 * 60 * 60, function () {
//                return Employee::with('media')->orderBy('created_at')->get();
//            });
//        }
//        if (!Cache::has('services')) {
//            Cache::remember('services', 5 * 60 * 60, function () {
//                return Service::with('media')->take(10)->get();
//            });
//        }
//        if (!Cache::has('courses')) {
//            Cache::remember('courses', 5 * 60 * 60, function () {
//                return Course::with(['lecturer','topic','media'])->orderByDesc('date')->take(5)->get();
//            });
//        }
        return view('welcome',[
            'book'=> Book::with('media')->where('type_id','1')->IsActive()->latest()->first(),
            'articles'=> Article::with(['writer','media'])->orderByDesc('date')->IsActive()->take(2)->get(),
            'courses'=> Course::with(['lecturer','topic','media'])->orderByDesc('date')->take(5)->get(),
            'employees' => Employee::with('media')->orderBy('created_at')->get(),
            'services'=> Service::with('media')->take(10)->get(),
            'home'=> HomeConfigs::first(),
            'featured_ads' => Ads::with('media')->where('is_featured',1)->orderBy('home_order')->get(),
            'featured_services' => Service::with('media')->where('is_featured',1)->orderBy('home_order')->get(),
            'youtube' => ContactData::where('title', 'youtube')->first()['value'],
            'locale' => request()->session()->get('locale'),
        ]);
    }
    public function dashboard()
    {
        return view('pages.dashboard.index', [
            'breadcrumb' => $this->breadcrumb([], 'Dashboard', false),
            'customers_count' => User::isActive()->count(),
        ]);
    }
    public function profile()
    {
        return view('pages.profile', [
            'locale' => request()->session()->get('locale'),
            'breadcrumb' => $this->breadcrumb([], 'Edit Profile')
        ]);
    }
}
