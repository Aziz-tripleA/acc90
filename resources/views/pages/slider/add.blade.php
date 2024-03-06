@extends('layouts.admin.dashboard')
@section('title','Add New Slide')
@section('d-styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/tree-select.css')}}">
@endsection
@section('d-content')
    <form action="{{route('slide.admin.store')}}" method="POST" class="ajax" id="slideStore"
          enctype="multipart/form-data">
        @include('pages.slider.partials.form',['submit_button'=>'Create'])
    </form>
@endsection
