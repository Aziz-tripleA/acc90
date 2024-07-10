<?php

namespace App\Http\Controllers;

use App\Models\AskHelp;
use App\Models\AboutConfigs;
use Illuminate\Http\Request;
use App\Presenters\BookPresenter;
use App\Http\Requests\StoreAskHelpRequest;
use App\Http\Requests\UpdateAskHelpRequest;
use App\Http\Controllers\Traits\AskHelp\Filtration;
use App\Mail\CounselingRequestMail;
use App\Models\CounselingType;
use Illuminate\Support\Facades\Mail;

class AskHelpController extends Controller
{
    use Filtration;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = AskHelp::latest();
        if ($this->filterQueryStrings()) {
            $requests = $this->filterData($request, $requests);
        }
        $requests = app(BookPresenter::class)->paginate($requests->get());
        $times = array(
            '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00'
        );
        $cities = array(
            'القاهرة', 'الجيزة', 'الاسكندرية', 'الفيوم', 'بني سويف', 'المنيا', 'اسيوط', 'سوهاج', 'الاسماعيلية', 'اسوان', 'الاقصر',
            'البحر الاحمر', 'بورسعيد', 'جنوب سيناء', 'الدقهلية', 'دمياط', 'السويس', 'الشرقية', 'شمال سيناء', 'الغربية', 'القليوبية',
            'قنا', 'كفر الشيخ', 'المنوفية', 'الوادي الجديد', 'مطروح'
        );
        $days = array(
            'السبت', 'الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'
        );
        return view('pages.askhelp.manager.index', [
            'requests' => $requests,
            'locale' => request()->session()->get('locale'),
            'cities' => $cities,
            'days' => $days,
            'times' => $times,
            'types' => CounselingType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.askhelp.step1', [
            'title' => 'طلب مشورة شخصية',
            'image' => asset('assets/images/backgrounds/img1.jpg'),
            'locale' => request()->session()->get('locale'),
            'types' => CounselingType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAskHelpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAskHelpRequest $request)
    {
        $data = $request->all();
        if (!$request->contactBefore) {
            $data['contactBefore'] = 'نعم';
        }
        if (!$request->has_previous_help) {
            $data['has_previous_help'] = True;
        }
        $request = AskHelp::create($data);

        return $this->returnCrudData(__('system_messages.common.create_success'), route('askhelp.edit', $request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AskHelp  $askHelp
     * @return \Illuminate\Http\Response
     */
    public function show(AskHelp $askHelp)
    {
        return view(
            'pages.askhelp.manager.show',
            [
                'request' => $askHelp,
                'types' => CounselingType::all(),
                'locale' => request()->session()->get('locale'),

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AskHelp  $askHelp
     * @return \Illuminate\Http\Response
     */
    public function edit(AskHelp $askHelp)
    {
        return view(
            'pages.askhelp.step2',
            [
                'request' => $askHelp,
                'title' => 'طلب مشورة شخصية',
                'image' => asset('assets/images/backgrounds/img1.jpg'),
                'locale' => request()->session()->get('locale'),
                'terms' => AboutConfigs::first()->terms_conditions,
                'types' => CounselingType::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAskHelpRequest  $request
     * @param  \App\Models\AskHelp  $askHelp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAskHelpRequest $request, AskHelp $askHelp)
    {
        $data = $request->except(['terms']);
        $req = $askHelp->update($data);
        if ($req) {
            // email  counseling.ministry@gmail.com   
            Mail::to("saraadelwassef@gmail.com")->send(new CounselingRequestMail(AskHelp::find($askHelp->id)));
        }
        return $this->returnCrudData(__('system_messages.common.create_success'), route('askhelp.confirm'));
    }

    /**
     * print.
     *
     * @param mixed $askHelp
     * @return Factory|View
     */
    public function print(AskHelp $askHelp)
    {
        return view('pages.askhelp.print', [
            'request' => $askHelp,
            'locale' => request()->session()->get('locale'),
        ]);
    }

    /**
     * confirm.
     *
     * @param mixed $askHelp
     * @return Factory|View
     */
    public function confirm(AskHelp $askHelp)
    {
        return view('pages.askhelp.confirm', [
            'request' => $askHelp,
            'locale' => request()->session()->get('locale'),
            'title' => 'تأكيد الطلب',
            //'image' => asset('assets/images/backgrounds/img1.jpg'),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AskHelp  $askHelp
     * @return \Illuminate\Http\Response
     */
    public function destroy(AskHelp $askHelp)
    {
        //
    }
}
