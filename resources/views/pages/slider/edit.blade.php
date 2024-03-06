@extends('layouts.admin.dashboard')
@section('title','Edit Slide')
@section('d-styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/tree-select.css')}}">
@endsection
@section('d-content')
    <form action="{{route('slide.admin.update',$slide->id)}}" method="POST" class="ajax" id="slideUpdate"
          enctype="multipart/form-data">
        @method('PATCH')
        <input type="hidden" name="redirect_to" value="{{url()->previous()}}">
        @include('pages.slider.partials.form',['submit_button'=>'Update'])
    </form>
@endsection
