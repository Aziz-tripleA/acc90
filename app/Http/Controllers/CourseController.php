<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\FeaturedImage;
use App\Models\ArticlesTopics;
use App\Presenters\BookPresenter;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Traits\Course\Filtration;

class CourseController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::query()->IsActive()->latest();
        $featured = FeaturedImage::where('title','courses')->first();
        $img ='';
        if($featured){
            $img = $featured->cover?$featured->cover->getUrl():'';
        }
        if ($this->filterQueryStrings()) {
            $courses = $this->filterData($request, $courses);  
        }
        $courses = app(BookPresenter::class)->paginate($courses->get());

        return view('pages.courses.index',[
            'locale' => request()->session()->get('locale'),
            'courses'=> $courses,
            'title' => 'مواد تعليمية',
            'image' => $img?:asset('assets/images/backgrounds/img1.jpg'),
            'topics'=> ArticlesTopics::where('type','course')->get(),
            'lecturers'=> Lecturer::all(),
            'breadcrumb' => $this->breadcrumb([], 'مواد تعليمية' ,false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstorfail();
        $related_courses = Course::query()->latest()->where('topic_id',$course->topic_id)->where('id','!=',$course->id)->take(3)->get();
        // if(is_array($related_courses) && count($related_courses)>1){
        //     $related_courses = $related_courses->random(3);
        // }
        return view('pages.courses.show',
            [
                'course'=>$course,
                'title' => 'مواد تعليمية',
                'locale' => request()->session()->get('locale'),
                'image'=>$course->getUrlFor('cover'),
                'type' =>$course->type,
                'lecturer'=>$course->lecturer,
                'date' => $course->date?:$course->created_at,
                'topic' => $course->topic,
                'related_courses'=> $related_courses,
                'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'مواد تعليمية',
                    'route' => route('course.index')
                ]
                ]
                , $course->title ,false)
                
            
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
