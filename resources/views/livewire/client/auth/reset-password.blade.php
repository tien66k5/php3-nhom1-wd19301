<div>
    <div class="container">
      <section class="vh-100">
        <div class="container-fluid">
          <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
            <div class="col-sm-6 text-black">
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
    
                <form method="POST" action="{{ route('password.update') }}" style="width: 23rem;">
                  @csrf
    
                  <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đặt Lại Mật Khẩu</h3>
    
                  <input type="hidden" name="token" value="{{ $token }}">
                 
    
                   <input type="hidden" name="email" value="{{ old('email', $email) }}">
                  
    
                  <div class="form-outline mb-4">
                    <label class="form-label">Mật khẩu mới</label>
                    <input name="password" type="password" class="form-control form-control-lg"
                           placeholder="Nhập mật khẩu mới" required />
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
    
                  <div class="form-outline mb-4">
                    <label class="form-label">Xác nhận mật khẩu</label>
                    <input name="password_confirmation" type="password" class="form-control form-control-lg"
                           placeholder="Nhập lại mật khẩu mới" required />
                  </div>
    
                  <div class="pt-1 mb-4">
                    <button class="btn btn-info btn-sm btn-block btn-custom" type="submit">
                      Cập nhật mật khẩu
                    </button>
                  </div>
    
                  <p class="small mb-5 pb-lg-2">
                    <a class="text-muted" href="{{ route('login') }}">Quay lại đăng nhập</a>
                  </p>
    
                </form>
    
              </div>
            </div>
    
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                   alt="Hình ảnh đặt lại mật khẩu" class="w-100 vh-100"
                   style="object-fit: cover; object-position: left;">
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
  