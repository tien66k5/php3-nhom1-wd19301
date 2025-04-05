@extends('livewire.client.layouts.app')

@section('title', 'Thông Tin Cá Nhân')

@section('content')


    <section class="account px-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <div class="container-fluid">
            <div class="row g-0">
                @livewire('Client.SideBar')
                <div class="col-lg-9">
                    <div class="account-info">
                        <div class="account-info-title">
                            <p>THÔNG TIN CÁ NHÂN</p>
                        </div>
                        <div class="account-info-form">
                            <form method="POST" action="{{ route('Account.update') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                                    <input type="text" id="fullname" name="name" class="form-control form-control-lg"
                                        value="{{ old('name', Auth::user()->name) }}" placeholder="Ex: NguyenVanA, ....">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="form-label">Tên</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control form-control-lg"
                                        value="{{ old('firstname', Auth::user()->firstname) }}">
                                    @error('firstname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="form-label">Họ</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control form-control-lg"
                                        value="{{ old('lastname', Auth::user()->lastname) }}">
                                    @error('lastname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                                    <input type="file" id="avatar" name="avatar" class="form-control form-control-lg">

                                    @error('avatar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                        value="{{ old('phone', Auth::user()->phone) }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Mật khẩu mới (nếu muốn thay đổi)</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-lg">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
      input.addEventListener("input", function () {
      let errorSpan = this.parentElement.querySelector(".text-danger");
      if (errorSpan) {
        if (this.value.trim()) {
        errorSpan.style.display = "none";
        } else {
        errorSpan.style.display = "inline";
        }
      }
      });
    });
    });

  </script>
@endsection