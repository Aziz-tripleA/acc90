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
              <div class="contact-step-number" style="background-color: #209AB8"><span>١</span></div>
              <strong>معلومات شخصية</strong>
            </li>
            <li>
              <div class="contact-step-number"><span>٢</span></div>
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
        <form class="site-form wow fadeInUp ajax" id="SubmitForm" action="{{route('askhelp.store')}}" method="POST" >
            @csrf
            <input type="hidden" name="humanType" value="">
            <input type="hidden" name="contactBefore" value="">
          <div class="form-row">
            <div class="form-col-half">
              <div class="form-group">
                <input class="form-input" id="Inputfullname" type="text" name="fullname" placeholder="الاسم الكامل" />
                <span class="text-danger" id="fullnameErrorMsg"></span>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <input class="form-input" id="InputAge" type="number" name="age" placeholder="السن" />
                <span class="text-danger" id="ageErrorMsg"></span>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group"><label>النوع</label></div>
              <div class="form-row">
                <label class="custom-checkbox">
                  <div class="custom-checkbox-label"><span>ذكر </span></div>
                  <input type="radio" id="gender" name="gender" value="ذكر"/>
                  <span class="custom-checkmark"></span>
                </label>
                <label class="custom-checkbox">
                  <div class="custom-checkbox-label"><span>انثي </span></div>
                  <input type="radio" id="gender1" name="gender" value="انثي"/>
                  <span class="custom-checkmark"></span>
                </label>
                <span class="text-danger" id="humanTypeErrorMsg"></span>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <input class="form-input" id="InputEmail" name="email" type="email" placeholder="البريد الالكتروني" />
                <span class="text-danger" id="emailErrorMsg"></span>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <input class="form-input" id="InputMobile" type="number" name="mobile" placeholder="رقم الهاتف" />
                <span class="text-danger" id="mobileErrorMsg"></span>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <div class="form-select">
                  <select class="form-input" id="InputCity" name="city">
                    <option value="0">المحافظة</option>
                    <option value="القاهرة">القاهرة</option>
                    <option value="الجيزة">الجيزة</option>
                    <option value="الاسكندرية">الاسكندرية</option>
                    <option value="الفيوم">الفيوم</option>
                    <option value="بني سويف">بني سويف</option>
                    <option value="المنيا">المنيا</option>
                    <option value="اسيوط">اسيوط</option>
                    <option value="سوهاج">سوهاج</option>
                    <option value="الاسماعيلية">الاسماعيلية</option>
                    <option value="اسوان">اسوان</option>
                    <option value="الاقصر">الاقصر</option>
                    <option value="البحر الاحمر">البحر الاحمر</option>
                    <option value="بورسعيد">بورسعيد</option>
                    <option value="جنوب سيناء">جنوب سيناء</option>
                    <option value="الدقهلية">الدقهلية</option>
                    <option value="دمياط">دمياط</option>
                    <option value="السويس">السويس</option>
                    <option value="الشرقية">الشرقية</option>
                    <option value="شمال سيناء">شمال سيناء</option>
                    <option value="الغربية">الغربية</option>
                    <option value="القليوبية">القليوبية</option>
                    <option value="قنا">قنا</option>
                    <option value="كفر الشيخ">كفر الشيخ</option>
                    <option value="المنوفية">المنوفية</option>
                    <option value="الوادي الجديد">الوادي الجديد</option>
                    <option value="مطروح">مطروح</option>
                  </select>
                  <img
                    class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                    alt=""
                  />
                  <span class="text-danger" id="cityErrorMsg"></span>
                </div>
              </div>
            </div>
            <div class="form-col-half">
              <div class="form-group">
                <label>هل قمت بالتواصل معنا من قبل</label>
              </div>
              <div class="form-row">
                <label class="custom-checkbox" >
                    <div class="custom-checkbox-label"><span>نعم </span></div>
                    <input type="radio" id="contact" name="contact" value="نعم" checked/>
                    <span class="custom-checkmark" ></span>
                </label>
                <label class="custom-checkbox" >
                    <div class="custom-checkbox-label"><span>لا </span></div>
                    <input type="radio" id="contact1" name="contact" value="لا"/>
                    <span class="custom-checkmark"></span>
                </label>
                <span class="text-danger" id="contactBeforeErrorMsg"></span>
              </div>
            </div>

            <div class="form-col-half">
              <div class="form-group">
                <label>            هل كان لك مقابلات مشورية سابقة؟                </label>
              </div>
              <div class="form-row">
                <label class="custom-checkbox" >
                    <div class="custom-checkbox-label"><span>نعم </span></div>
                    <input type="radio" id="has_previous" name="has_previous" value="نعم" checked/>
                    <span class="custom-checkmark" ></span>
                </label>
                <label class="custom-checkbox" >
                    <div class="custom-checkbox-label"><span>لا </span></div>
                    <input type="radio" id="has_previous1" name="has_previous" value="لا"/>
                    <span class="custom-checkmark"></span>
                </label>
                <span class="text-danger" id="hasPreviousHelpErrorMsg"></span>
              </div>
            </div>

            <div class="form-col-half">
              <div class="form-group">
                <input class="form-input" id="Inputhow_know" type="text" name="how_know" placeholder="كيف عرفت الخدمة " />
                <span class="text-danger" id="how_knowErrorMsg"></span>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <a class="form-cancel-btn" href="#">إلغاء </a>
            <button type="submit" class="form-main-btn" >
                <span>التالي</span>
                <img src="{{ asset('assets/images/icons/btn-arrow-next-white.png') }}" alt="" />
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
  $("input#gender").on('change', function () {
      if ($(this).prop("checked") === true) {
          $("input[type='hidden'][name='humanType']").val('ذكر');
      }
  });
  $("input#gender1").on('change', function () {
      if ($(this).prop("checked") === true) {
        $("input[type='hidden'][name='humanType']").val("أنثى");
      }
  });

  $("input#contact").on('change', function () {
      if ($(this).prop("checked") === true) {
          $("input[type='hidden'][name='contactBefore']").val('نعم');
      }
  });
  $("input#contact1").on('change', function () {
      if ($(this).prop("checked") === true) {
        $("input[type='hidden'][name='contactBefore']").val("لا");
      }
  });

  $("input#has_previous").on('change', function () {
      if ($(this).prop("checked") === true) {
          $("input[type='hidden'][name='has_previous_help']").val('نعم');
      }
  });
  $("input#has_previous1").on('change', function () {
      if ($(this).prop("checked") === true) {
        $("input[type='hidden'][name='has_previous_help']").val("لا");
      }
  })

</script>
<script type="text/javascript">

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let fullname = $('#Inputfullname').val();
    let email = $('#InputEmail').val();
    let mobile = $('#InputMobile').val();
    let humanType = $('input[name="humanType"]').val();
    let age = $('#InputAge').val();
    let city = $('#InputCity').val();
    let how_know = $('#Inputhow_know').val();
    let contactBefore = $('input[name="contactBefore"]').val();
    let has_previous_help = $('input[name="has_previous_help"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });
    $.ajax({
      url: "{{route('askhelp.store')}}",
      type:"POST",
      data:{
        _token: "{{ csrf_token() }}",
        fullname:fullname,
        email:email,
        mobile:mobile,
        humanType:humanType,
        age:age,
        city:city,
        contactBefore:contactBefore,
        has_previous_help:has_previous_help,
        how_know:how_know
      },
      success:function(response){
        $('#successMsg').show();
       // console.log(response);
        window.location.href = response.url
      },
      error: function(response) {
        console.log(response);
        $('#fullnameErrorMsg').text(response.responseJSON.errors.fullname);
        $('#ageErrorMsg').text(response.responseJSON.errors.age);
        $('#humanTypeErrorMsg').text(response.responseJSON.errors.humanType);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
        $('#cityErrorMsg').text(response.responseJSON.errors.city);
        $('#contactBeforeErrorMsg').text(response.responseJSON.errors.contactBefore);
        $('#has_previous_helpErrorMsg').text(response.responseJSON.errors.has_previous_help);
        $('#how_knowErrorMsg').text(response.responseJSON.errors.how_know);
      },
      });
    });
  </script>
@endsection
