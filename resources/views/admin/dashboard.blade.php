@extends('layouts.master')
@section('title')
LearningSS | Dashboard Admin
@endsection

{{-- Thanh dieu huong dau trang --}}
@section('header')
	@include('admin.partials.header')
@endsection

{{-- Thong tin ha muc --}}
@section('footer')
	@include('admin.partials.footer')
@endsection

{{-- Noi dung trung tam cua trang --}}
@section('content')
	<div class="columns">
		@include('admin.partials.sidebar')
		
		@include('admin.partials.content')

	</div>
@endsection