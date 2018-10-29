@extends('layouts.master')
@section('title')
Welcome LearningSS
@endsection
@section('header')
	@include('partials.header')
@endsection

@section('footer')
	@include('partials.footer')
@endsection

@section('content')
<section class="section">
	<div class="container has-text-centered" id="title">
		<h1 class="is-size-1-desktop is-size-2-tablet is-size-3-mobile has-text-link">Hệ thống hỗ trợ ôn tập kiến thức</h1>
	</div>
</section>
<section class="section ">
	<div class="container">
		<div class="columns has-background-light">
			<div class="column">
				<article class="media is-info">
					<figure class="media-left">
						<span class="icon is-medium">
							<i class="fas fa-2x fa-user-graduate"></i>
						</span>
					</figure>
					<div class="media-content">
						<div class="content">
							<h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Bạn là sinh viên</h1>
							<ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
								<li>Tham gia bộ đề trắc nghiệm ngẫu nhiên</li>
								<li>Tìm kiếm và tải tài liệu học tập</li>
								<li>Dự kiểm tra với bộ đề của giảng viên</li>
								<li>Tạo kênh trao đổi học tập</li>
								<li>Gửi yêu cầu trợ giúp đến giảng viên cụ thể</li>
							</ul>
						</div>
					</div>
				</article>
			</div>
			<div class="column">
				<article class="media front-content">
					<div class="media-content">
						<div class="content">
							<h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Giảng viên</h1>
							<figure class="image is-128x128">
								<img src="/images/lecturer-teach.jpg" alt="Giảng viên có thể làm gì">
							</figure>
						</div>
					</div>
				</article>
				<article class="media is-danger back-content">
					<figure class="media-left">
						<span class="icon is-medium">
							<i class="fas fa-2x fa-chalkboard-teacher"></i>
						</span>
					</figure>
					<div class="media-content">
						<div class="content">
							<h1 class="title is-size-4-desktop is-size-5-tablet is-size-6-mobile">Giảng viên có thể</h1>
							<ul class="is-size-5-desktop is-size-6-tablet is-size-7-mobile">
								<li>Cập nhật câu hỏi trắc nghiệm</li>
								<li>Tạo nhánh kiến thức mới và cung cấp tài liệu</li>
								<li>Khởi tạo bồ đề kiểm tra, xem bộ đề sẵn có</li>
								<li>Xem kết quả dự kiểm tra từ sinh viên</li>
								<li>Xem các yêu cầu trợ giúp</li>
							</ul>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
@endsection