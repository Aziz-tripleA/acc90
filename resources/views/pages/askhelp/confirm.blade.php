@extends('layouts.front',['basic'=>1])
@section('title','تأكيد الطلب')
@section('f-content')
<section class="data-contain">
    <div class="contact-details sectionBotPad move-top ask-for-help">
      <div class="section-head sectionPad wow fadeInUp">
        <h1 class="section-title">تم تأكيد الطلب</h1>
        <p>
            نرجو ارسال الابليكيشن بعد عمل scan علي الايميل التالي counseling.requests@gmail.com او تسليمها للمكتب مباشرة

        </p>
      </div>
    </div>
</section>
@section('scripts')
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    
@endsection
