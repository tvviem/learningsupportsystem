@extends('layouts.master')
@section('title')
LearningSS - Huong dan dang ky
@endsection

@section('header')
	@include('partials.header')
@endsection
@section('footer')
	@include('partials.footer')
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="tile is-ancestor content">
            <div class="tile is-4 is-parent">
                <div class="tile is-child box">
                    <h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Bước 1 - Cấp tài khoản</h1>
                    <ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
                        <li>Người dùng có nhu cầu học tập, giảng dạy.</li>
                        <li>Thời gian đầu hệ thống chỉ cho phép liên hệ qua email xin cấp tài khoản.</li>
                        <li>Khi hệ thống đi vào ổn định sẽ cho phép đăng ký tự do.</li>
                    </ul>
                </div>
            </div>
            <div class="tile is-4 is-parent">
                <div class="tile is-child box">
                    <h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Bước 2 - Đăng nhập</h1>
                    <ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
                        <li>Đăng nhập hệ thống với tài khoản mặc định</li>
                        <li>Trước khi sử dụng chức năng, người dùng đổi mật khẩu lần đầu.</li>
                    </ul>
                </div>
            </div>
            <div class="tile is-4 is-vertical is-parent">
                <div class="tile is-child box">
                    <h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Sinh viên</h1>
                    <ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
                        <li>Tham gia bộ đề trắc nghiệm ngẫu nhiên</li>
                        <li>Tìm kiếm và tải tài liệu học tập</li>
                        <li>Dự kiểm tra với bộ đề của giảng viên</li>
                        <li>Tạo kênh trao đổi học tập</li>
                        <li>Gửi yêu cầu trợ giúp đến giảng viên cụ thể</li>
                    </ul>
                </div>
                <div class="tile is-child box">
                    <h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Giảng viên</h1>
                    <ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
                        <li>Cập nhật câu hỏi trắc nghiệm</li>
                        <li>Tạo nhánh kiến thức mới và cung cấp tài liệu</li>
                        <li>Khởi tạo bồ đề kiểm tra, xem bộ đề sẵn có</li>
                        <li>Xem kết quả dự kiểm tra từ sinh viên</li>
                        <li>Xem các yêu cầu trợ giúp</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection