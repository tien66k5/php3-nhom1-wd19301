<div class="container">
  <section class="vh-100">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6 text-black">
                  <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                      <form wire:submit.prevent="register" style="width: 23rem;">
                          @csrf
                          <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Ký</h3>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerName">Tên đăng nhập</label>
                              <input type="text" wire:model="name" id="registerName" class="form-control form-control-lg" />
                              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerFirstname">Tên</label>
                              <input type="text" wire:model="firstname" id="registerFirstname" class="form-control form-control-lg" />
                              @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerLastname">Họ</label>
                              <input type="text" wire:model="lastname" id="registerLastname" class="form-control form-control-lg" />
                              @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerEmail">Email</label>
                              <input type="email" wire:model="email" id="registerEmail" class="form-control form-control-lg" />
                              @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerPhone">Số Điện Thoại</label>
                              <input type="text" wire:model="phone" id="registerPhone" class="form-control form-control-lg" />
                              @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="registerPassword">Mật Khẩu</label>
                              <input type="password" wire:model="password" id="registerPassword" class="form-control form-control-lg" />
                              @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-outline mb-4">
                              <label class="form-label" for="password_confirmation">Nhập Lại Mật Khẩu</label>
                              <input type="password" wire:model="password_confirmation" id="password_confirmation" class="form-control form-control-lg" />
                              <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                          </div>

                          <div class="pt-1 mb-4">
                              <button class="btn btn-info btn-sm btn-block btn-custom" type="submit">Đăng Ký</button>
                          </div>

                          <p>Bạn đã có tài khoản? <a href="/loginForm" class="link-info">Đăng nhập tại đây</a></p>
                      </form>
                  </div>
              </div>
              <div class="col-sm-6 px-0 d-none d-sm-block">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                      alt="Hình ảnh đăng ký" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
              </div>
          </div>
      </div>
  </section>
</div>

@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
      let inputs = document.querySelectorAll("input");
 
      inputs.forEach(input => {
          input.addEventListener("input", function () {
              let errorSpan = this.nextElementSibling;
              if (errorSpan && errorSpan.classList.contains("text-danger")) {
                  errorSpan.style.display = this.value.trim() ? "none" : "inline";
              }
          });
      });
 
      let password = document.getElementById("registerPassword");
      let confirmPassword = document.getElementById("password_confirmation");
 
      confirmPassword.addEventListener("input", function () {
          let errorSpan = this.nextElementSibling;
          if (password.value !== confirmPassword.value) {
              errorSpan.textContent = "Mật khẩu nhập lại không khớp.";
              errorSpan.style.display = "inline";
          } else {
              errorSpan.style.display = "none";
          }
      });
  });
</script>
@endsection
