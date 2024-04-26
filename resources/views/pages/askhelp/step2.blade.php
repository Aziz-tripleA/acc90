@extends('layouts.front',['basic'=>1])
@section('title','طلب مشورة شخصية')
@section('f-content')
<section class="data-contain">
    <div class="contact-details sectionBotPad move-top ask-for-help">
      <div class="section-head sectionPad wow fadeInUp">
        <h1 class="section-title">طلب مشورة شخصية</h1>
        {{-- <p>
          في نهاية هذا الطلب ستقوم بطباعة المعلومات و ارسالها لنا في المكتب
        </p>
        <span
          >مبنى كنيسة النعمة الرسولية 19ش الوجوه، الترعة البولاقية، خلوصي.
          شبرا مصر</span
        > --}}
        <div class="contact-steps">
          <ul>
            <li class="active">
              <div class="contact-step-number"><span>١</span></div>
              <strong>معلومات شخصية</strong>
            </li>
            <li class="active">
              <div class="contact-step-number" style="background-color: #209AB8"><span>٢</span></div>
              <strong> نوع المشورة المطلوبة </strong>
            </li>
            <li>
              <div class="contact-step-number"><span>٣</span></div>
              <strong>تأكيد الطلب </strong>
            </li>
          </ul>
        </div>
      </div>
      <div class="contact-details-wrap sectionPad">
        <form id="SubmitForm" class="site-form wow fadeInUp" action="{{route('askhelp.update',$request)}}" method="POST">
            @csrf
            @method('PATCH')
          <div class="form-row">
            {{-- <div class="form-col-half">
              <div class="form-group">
                <div class="form-select">
                    <select class="form-input" name="time" id="InputTime">
                        <option value="">إختار الميعاد المناسب</option>
                        <option value="10:00" @if ($request->time == '10:00') selected @endif>10:00</option>
                        <option value="11:00" @if ($request->time == '11:00') selected @endif>11:00</option>
                        <option value="12:00" @if ($request->time == '12:00') selected @endif>12:00</option>
                        <option value="01:00" @if ($request->time == '01:00') selected @endif>01:00</option>
                        <option value="02:00" @if ($request->time == '02:00') selected @endif>02:00</option>
                        <option value="05:00" @if ($request->time == '05:00') selected @endif>05:00</option>
                        <option value="06:00" @if ($request->time == '06:00') selected @endif>06:00</option>
                        <option value="07:00" @if ($request->time == '07:00') selected @endif>07:00</option>
                        <option value="08:00" @if ($request->time == '08:00') selected @endif>08:00</option>
                        <option value="09:00" @if ($request->time == '09:00') selected @endif>09:00</option>
                    </select>
                    <img
                    class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                    alt=""
                    />
                    <span class="text-danger" id="timeErrorMsg"></span>

                </div>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <div class="form-select">
                    <select class="form-input" name="day" id="InputDay">
                        <option value="" >أختار اليوم المناسب</option>
                        <option value="السبت" @if ($request->day == 'السبت') selected @endif>السبت</option>
                        <option value="الأحد" @if ($request->day == 'الأحد') selected @endif>الأحد</option>
                        <option value="الإثنين" @if ($request->day == 'الإثنين') selected @endif>الإثنين</option>
                        <option value="الثلاثاء" @if ($request->day == 'الثلاثاء') selected @endif>الثلاثاء</option>
                        <option value="الأربعاء" @if ($request->day == 'الأربعاء') selected @endif>الأربعاء</option>
                        <option value="الخميس" @if ($request->day == 'الخميس') selected @endif>الخميس</option>
                        <option value="الجمعة" @if ($request->day == 'الجمعة') selected @endif>الجمعة</option>
                    </select>
                    <img class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                    alt=""
                  />
                  <span class="text-danger" id="dayErrorMsg"></span>

                </div>
              </div>
            </div> --}}
            <div class="form-col-half">
              <div class="form-group">
                <div class="form-select">
                    <select class="form-input" name="counseling_type_id" id="InputType">
                        <option value="" >أختيار نوع المشورة</option>
                        @if (count($types)>0)
                          @foreach ($types as $type)
                            <option value="{{$type->id}}" @if ($request->counseling_type_id == $type->id) selected @endif>{{$type->type}}</option>
                          @endforeach
                        @endif
                    </select>

                    <img class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                    alt="" />
                </div>
              </div>
              <span class="text-danger" style="color: #c41e1c;" id="typeErrorMsg"></span>
            </div>
            <div class="form-col-half" >
              <div class="form-group">
                  @if (count($types)>0)
                    @foreach ($types as $type)
                      <a href="{{$type->getUrlFor('form')}}" target="_blank" download style="display: none" class="type" id="show{{$type->id}}" >  تحميل استمارة {{$type->type}}</a>
                    @endforeach
                  @endif
              </div>
            </div>
            <div class="form-col-half flex-column-wrap">
              {{-- <div class="form-group">
                <label>الميعاد</label>
                <div class="form-row">
                    <label class="custom-checkbox">
                        <div class="custom-checkbox-label">
                        <span>صباحاً </span>
                        </div>
                        <input id="Inputam_pm" type="radio" name="am_pm" value="am" @if ($request->am_pm == 'am') checked @endif/>
                        <span class="custom-checkmark">
                        </span>
                    </label>
                    <label class="custom-checkbox">
                        <div class="custom-checkbox-label">
                            <span>مساء </span>
                        </div>
                        <input id="Inputam_pm" type="radio" name="am_pm" value="pm" @if ($request->am_pm == 'pm') checked @endif/>
                        <span class="custom-checkmark"></span>
                        <span class="text-danger" id="am_pmErrorMsg"></span>

                    </label>
                </div>
              </div> --}}
              <div class="policies-key">
                <label class="custom-checkbox checkbox">
                    <div class="custom-checkbox-label">
                    <span>لقد اتطلعت علي </span>
                  </div>
                  <input type="checkbox" name="terms" id="InputTerms"/>
                  <span class="custom-checkmark" ></span>
                  </label>
                  <span class="modal-open-key" related-modal="policies">اللائحة و القوانين </span>

              </div>
              <span class="text-danger" style="color: #c41e1c;" id="termsErrorMsg"></span>

            </div>
            <div class="flex-column-wrap">
              <div class="policies-key">
                <label class="custom-checkbox checkbox">
                  <div class="custom-checkbox-label">
                    <span>لقد قمت بتحويل مبلغ مصاريف الي فودافون كاش ٠١٠٦٢٠٤١٨٨٧  </span>
                  </div>
                  <input type="checkbox" name="transfer" id="InputTransfer"/>
                  <span class="custom-checkmark" ></span>
                </label>

              </div>
              <span class="text-danger" style="color: #c41e1c;" id="transferErrorMsg"></span>

            </div>
            <div class="flex-column-wrap" style="margin-top: 20px;">
              <div class="policies-key">
                <label class="custom-checkbox checkbox">
                  <div class="custom-checkbox-label">
                    <span>نرجو ارسال الابليكيشن بعد عمل scan علي الايميل التالي counseling.requests@gmail.com او تسليمها للمكتب مباشرة </span>
                  </div>
                </label>
              </div>
            </div>
              {{-- <div class="form-col-half">
              <div class="form-group">
                <label>ملاحظات اخري</label>
                <textarea
                  id="InputNotes"
                  class="form-input"
                  name="notes"
                  cols="30"
                  rows="8"
                  placeholder="ملاحظات اخري"
                >
                @if($request) {{$request->notes}} @endif
                </textarea>
                <span class="text-danger" id="notesErrorMsg"></span>

              </div>
            </div> --}}
            <div class="form-col-half">
                <div class="form-row"></div>
            </div>
          </div>
          <div class="form-actions">
            <a class="form-cancel-btn" href="{{ route('askhelp.create') }}">إلغاء </a>
            <button type="submit" class="form-main-btn" >
                <span class="no-margin">تأكيد الطلب</span>
            </a>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-contain policies">
      <div class="modal-wrap sectionPad">
        <div class="modal-item">
          <div class="close-modal">
            <img src="{{ asset('assets/images/icons/close-black.png') }}" alt="close-icon" />
          </div>
          <div class="modal-item-body">
            <h2 class="section-title">اللائحة و القوانين</h2>
            <div class="dynamic-data-wrap">
             {!! $terms !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

  $('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let type = $('#InputType').val();
    // let day = $('#InputDay').val();
    // let am_pm = $('input[name="am_pm"]').val();
    let terms =$('#InputTerms').is(':checked');
    let transfer =$('#InputTransfer').is(':checked');
    if($('#InputTransfer').is(":checked")){
      let transfer = $('#InputTransfer').is(":checked") ;
    }
    if($('input[name="terms"]').is(":checked")){
      let terms = true ;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });
    $.ajax({
      url: "{{route('askhelp.update',$request)}}",
      type:"Patch",
      data:{
        _token: "{{ csrf_token() }}",
        counseling_type_id:type,
        terms:terms,
        transfer:transfer,
      },
      success:function(response){
        $('#successMsg').show();
        window.location.href = response.url
        console.log(response.url);
      },
      error: function(response) {
        console.log(response);
        // if(response.responseJSON.errors.counseling_type_id){
        //   $('#typeErrorMsg').text('نوع المشورة مطلوب');
        // }else if(response.responseJSON.errors.terms){
        //   $('#typeErrorMsg').text('هذا الحقل مطلوب');
        // }
        $('#transferErrorMsg').text('هذا الحقل مطلوب');
        $('#typeErrorMsg').text('هذا الحقل مطلوب');
        // $('#am_pmErrorMsg').text(response.responseJSON.errors.am_pm);
        // $('#notesErrorMsg').text(response.responseJSON.errors.notes);
        $('#termsErrorMsg').text('هذا الحقل مطلوب');
      },
    });
  });

$(document).ready(function(){
    $('#InputType').on('change', function(){
    	 var demovalue = $(this).val();
       $("a.type").hide();
       $("#show"+demovalue).show();
    });
});
</script>
@endsection
