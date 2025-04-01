@extends('livewire.client.layouts.app')

@section('title', 'Trang Chủ')

@section('content')

<section></section>
 <!-- 404 Start -->
 <div class="container-fluid bg-light py-5">
    <div class=" py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">Xin lỗi bạn không có quyền truy cập</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home.index') }}">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->

@endsection

@section('scripts')
    <script>
    //   viết script tại đây nếu đây là script riêng
    </script>
@endsection
