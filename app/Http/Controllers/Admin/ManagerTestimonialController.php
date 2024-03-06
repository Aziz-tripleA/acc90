<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Article\Filtration;
use App\Presenters\BookPresenter;


class ManagerTestimonialController extends Controller
{
    use Filtration;
    /**
     * index.
     *
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::latest();
        if ($this->filterQueryStrings()) {
            $testimonials = $this->filterData($request, $testimonials);  
        }
        $testimonials = app(BookPresenter::class)->paginate($testimonials->get());

        return view('pages.testimonials.manager.index',[
            'testimonials'=>$testimonials
        ]);
    }

    /**
     * create.
     */
    public function create()
    {
        $config = Testimonial::getStatusFor();
        return view('pages.testimonials.manager.add', [
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Testimonials',
                    'route' => route('testimonial.admin.index')
                ]
            ], 'Add New Testimonial'),
        ]);
    }

    /**
     * store.
     *
     * @param testimonialRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = testimonial::create($request->all());
        
        return $this->returnCrudData(__('system_messages.common.create_success'), route('testimonial.admin.index'));
    }

    /**
     * edit.
     *
     * @param mixed $testimonial
     * @return Factory|View
     */
    public function edit(Testimonial $testimonial)
    {
        $config = Testimonial::getStatusFor();

        return view('pages.testimonials.manager.edit', [
            'testimonial' => $testimonial,
            'breadcrumb' => $this->breadcrumb([
                [
                    'title' => 'Testimonials',
                    'route' => route('testimonial.admin.index')
                ]
            ], 'Edit Testimonial'),
            'active_status' => $config['status']->firstWhere('order', 1)->id,
            'inactive_status' => $config['status']->firstWhere('order', 2)->id,
        ]);
    }

    /**
     * update.
     *
     * @param mixed Testimonial
     * @param TestimonialRequest $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update(Testimonial $testimonial, TestimonialRequest $request)
    {
        $testimonial->update($request->all()); 
        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to);
    }

    /**
     * delete.
     *
     * @param Testimonial $testimonial
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Testimonial $testimonial, Request $request)
    {
        $testimonial->delete();
        return $this->returnCrudData(__('system_messages.common.delete_success'), $request->redirect_to ?:url()->previous());
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("testimonials")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>__('system_messages.common.delete_success')]);
    }
}
