<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ArticlesTopics;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Traits\Course\Filtration;
use App\Http\Requests\CourseRequest;

class ManagerCourseController extends Controller
{
    use Filtration;
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $courses = Course::with(['lecturer','topic'])->latest()->paginate(10);

        return view('pages.courses.manager.index',[
            'courses'=>$courses
        ]);
    }

    /**
     * create.
     */
    public function create(Request $request)
    {
        $cloneId = $request->clone;
        $config = Course::getStatusFor();
        return view('pages.courses.manager.add', [
            'course' => $cloneId ? Course::find($cloneId) : null,
            'topics' => ArticlesTopics::where('type','course')->get(),
            'lecturers' => Lecturer::all()->sortBy('name'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Courses',
                    'route' => route('course.admin.index')
                ]
            ], 'Add New Course'),
        ]);
    }

    /**
     * store.
     *
     * @param CourseRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(CourseRequest $request)
    {

        $data = $request->except( 'cover','pdf_file');
        $data['slug'] = slugfy($request->title,'-');
      
        $course = Course::create($data);

        if ($cover = $request->cover) {
            $course->addHashedMedia($cover)->toMediaCollection('cover');
        }

        if ($pdf_file = $request->pdf_file) {
            $course->addHashedMedia($pdf_file)->toMediaCollection('pdf_file');
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('course.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $course
     */
    public function edit(Course $course)
    {
        $config = Course::getStatusFor();
        return view('pages.courses.manager.edit', [
            'course' => $course,
            'topics' => ArticlesTopics::where('type','course')->get(),
            'lecturers' => Lecturer::all()->sortBy('name'),
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Courses',
                    'route' => route('course.admin.index')
                ]
            ], 'Edit Course'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * update.
     *
     * @param mixed Course
     * @param CourseRequest $request
     */
    public function update(Course $course, CourseRequest $request)
    {
      
        $data = $request->except( 'cover');
        $course->update($data);
        if ($cover = $request->cover) {
            $course->addHashedMedia($cover)->toMediaCollection('cover');
        }
        if ($pdf_file = $request->pdf_file) {
            $course->addHashedMedia($pdf_file)->toMediaCollection('pdf_file');
        }
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Course $course
     * @param Request $request
     * @throws Exception
     */
    public function destroy(Course $course, Request $request)
    {
        $course->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("courses")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
