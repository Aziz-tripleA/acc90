@extends('layouts.front')
@section('title','التبرع')
@section('f-content')
<div class="donate-contain sectionBotPad">
  <div class="donate-wrap sectionPad">
    <div class="donate-text wow fadeInUp">
      <strong>شكرآً لك لوصولك لهذة الصفحة</strong>
      <p>
        إذا أردت المساهمة بتبرع أو تعهد شهري للمشاركة في نفقات الخدمة التي
        نقدمها مجاناً 100% للمخدومين، حسب سياستنا المعلنة، سواء كنت داخل
        مصر أو خارجها،
      </p>
      <p>
        لتحويل النقود، إن لم يستطع المتبرع توصيلها لمكتبنا فيمكنه التبرع
        من خلال طرق التبرع لدينا
      </p>
      <div class="blessing-item">
        <img src="{{ asset('assets/images/icons/pray.png') }}" alt="الرب يبارككم" />
        <h2 class="section-title">الرب يبارككم</h2>
        <p>
          تخضع الخدمة للإشراف المالي والقانوني لرابطة الإنجيليين بمصر/
          المجلس الإنجيلي العام
        </p>
        <a href="{{route('about')}}">الأهداف والقيم الجوهرية للخدمة</a>
        <a href="{{route('service.index')}}">الميثاق الأدبي/الأخلاقي للخدمة </a>
      </div>
    </div>
    <div class="donate-list-wrap wow fadeInUp">
      <strong>طرق التبرع</strong>
      {!! $transfer !!}
      {{-- <ul class="donate-list">
        <li>
          <strong>الإيداع في حسابنا الجاري</strong>
          <p>
            بأي مكتب بريد بإسم “ملكة عزيز جرجس”، حساب رقم
            0133412000380818، مع إرسال نسخة من إيصال الإيداع لنا على
            البريد الإلكتروني.
          </p>
          <p>counseling.ministry@gmail.com</p>
        </li>
        <li>
          <strong>اورانج كاش</strong>
          <p>
            على الرقم 01228716850 باسم ايفيت فؤاد زاخر، مع ضرورة ارسال
            صورة من الإيصال او Screenshot من عملية التحويل
          </p>
        </li>
        <li>
          <strong>الإيداع ببنك كريدي أجريكول</strong>
          <p>باسم ”إيفيت فؤاد زاخر“:</p>
          <p>Credit Agricole - Evette Fouad zakher - A / C # 17180101</p>
          <p>و اذا كنت خارج مصر: Swift code AGRIEGCX</p>
          <p>مع ضرورة ارسال صورة من ايصال الايداع لنا</p>
        </li>
        <li>
          <strong>شركات التحويل لو من خارج مصر</strong>
          <p>
            شركات التحويل التالية فقط (بإسم: ابتسام ثابت بشيت Ebtisam
            Thabet Besheet)
          </p>
          <a>Western Union / Moneygram</a>
          <p>
            مع ضرورة إرسال صورة الحوالة/الايصال/رقم التحويل لنا مع اسم
            الشركة التي تم استخدامها.
          </p>
        </li>
      </ul> --}}
    </div>
  </div>
</div>    
@endsection