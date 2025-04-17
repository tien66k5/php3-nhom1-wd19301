<div>
  <div class="container">
    <section class="vh-100">
      <div class="container-fluid">
        <div class="row">
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

      
          <div class="col-sm-6 text-black">
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
              <form wire:submit.prevent="login" style="width: 23rem;">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Nhập</h3>

                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email</label>
                  <input wire:model="email" id="email" type="email" class="form-control form-control-lg"
                    placeholder="Nhập email của bạn" />
                  @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Mật khẩu</label>
                  <input wire:model="password" id="password" type="password" class="form-control form-control-lg"
                    placeholder="Nhập mật khẩu" />
                  @error('password')
            <span class="text-danger">{{ $message }}</span>
          @enderror
                </div>

                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-sm btn-block btn-custom" type="submit">Đăng Nhập</button>
                </div>

                <div class="pt-1 mb-4">
                  <a href="{{ route('auth.google') }}" class="btn btn-block btn-danger btn-sm btn-custom">
                    <i class="fa fa-google"></i> Đăng nhập Google
                  </a>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="/forgot-password">Quên mật khẩu?</a></p>
                <p>Bạn chưa có tài khoản? <a href="/registerForm" class="link-info">Đăng ký ngay</a></p>

                @if (session('error'))
          <p class="text-danger">{{ session('error') }}</p>
        @endif
                </form>

            </div>
          </div>

          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
              alt="Hình ảnh đăng nhập" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
          </div>
        </div>
      </div>
    </section>
  </div>

</div>

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