@extends('layouts.master')
@section('title')
LearningSS - Dang nhap
@endsection

@section('header')
	@include('partials.header')
@endsection
@section('footer')
	@include('partials.footer')
@endsection
  

@section('content')
<section class="section is-paddingless m-t-10">
	<div class="container">
		@include('components.messages')
	</div>
</section>
<div class="columns is-mobile is-centered m-t-30">
    <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen">
      <div class="card">
        <div class="card-content">
          <h1 class="title is-size-4 has-text-centered">Đăng nhập hệ thống</h1>
          <form action="{{route('login')}}" method="POST" role="form">
            @csrf
            <div class="field">
              <label for="identity" class="label">Email hoặc Username</label>
              <p class="control">
                <input class="input {{$errors->has('identity') ? 'is-danger' : ''}}" type="text" name="identity" id="identity" value="{{old('identity')}}" required autofocus>
              </p>
              @if ($errors->has('identity'))
                <p class="help is-danger">{{$errors->first('identity')}}</p>
              @endif
            </div>
            <div class="field">
              <label for="password" class="label">Mật khẩu</label>
              <p class="control">
                <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" required autofocus>
              </p>
              @if ($errors->has('password'))
                <p class="help is-danger">{{$errors->first('password')}}</p>
              @endif
  
            </div>
            <b-checkbox name="remember" class="m-t-20">Ghi trạng thái</b-checkbox>
  
            <button class="button is-success is-outlined is-fullwidth m-t-30" type="submit">Đăng nhập</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <h5 class="has-text-centered m-t-20"><a href="{{route('password.request')}}" class="is-muted">Forgot Your Password?</a></h5>
    </div>
  </div>
@endsection
