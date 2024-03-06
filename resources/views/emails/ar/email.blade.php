@extends('emails.template')
@section('content')
<p>{!!$body!!}</p>
<h3>مع تحيات فريق {{config('app.name')}}</h3>
@endsection
