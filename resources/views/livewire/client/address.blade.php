<div>
    
    <section class="account px-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <div class="container-fluid">
            <div class="row g-0">
                @include('components.side-bar')

                <div class="col-lg-9">
               
                    
                    <div class="address-form">
                        <div class="form-group">
                            <label for="province">Tỉnh/Thành phố</label>
                            <select wire:model="selectedProvince" wire:key="province-select" id="province">
                                <option value="">-- Chọn tỉnh --</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province['code'] }}">{{ $province['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="district">Quận/Huyện</label>
                            <select wire:model="selectedDistrict" id="district" >
                                <option value="">-- Chọn huyện --</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district['code'] }}">{{ $district['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Phường/Xã</label>
                            <select wire:model="selectedWard" id="ward">
                                <option value="">-- Chọn xã --</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward['code'] }}">{{ $ward['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="addressDetail">Địa chỉ chi tiết</label>
                          <input wire:model="address" type="text" name="addressDetail">
                        </div>
                    
                        <div class="form-group">
                            <label for="addressDetail">Số điện thoại</label>
                          <input wire:model="phone" type="text" name="phone">
                        </div>
                    
                    <form wire:submit.prevent="addressAdd" >
                        <button class="primary-btn order-submit" >Xác nhận</button>
                    </form>

                </div>
            </div>
        </div>

    </section>

</div>
@script

<script>
                    
    $('#province').on('change', function () { 
        
        let id = $(this).val()

        $wire.dispatch('change-province', { provinceId: id });
    })


    $('#district').on('change', function () {
        
        let id = $(this).val()

        $wire.dispatch('change-district', { districtId: id });
    })


</script>
@endscript