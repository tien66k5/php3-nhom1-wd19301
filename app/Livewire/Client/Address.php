<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\CheckoutAddresses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Address extends Component
{
    public $provinces = [];
    public $districts = [];
    public $wards = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedWard = null;

    public $provinceMap = [];
    public $districtMap = [];
    public $wardMap = [];

    public $user;
    public $address;
    public $phone;

    public function mount()
    {
        $response = Http::withoutVerifying()->get('https://provinces.open-api.vn/api/p/');

        if ($response->successful()) {
            $this->provinces = $response->json();

            foreach ($this->provinces as $province) {
                $this->provinceMap[$province['code']] = $province['name'];
            }
        }

        $this->user = User::find(Auth::id());
    }

    #[On('change-province')]
    public function updatedSelectedProvince($provinceId)
    {
        if (!$provinceId) {
            $this->districts = [];
            $this->wards = [];
            $this->selectedDistrict = null;
            $this->selectedWard = null;
            return;
        }

        $response = Http::withoutVerifying()->get("https://provinces.open-api.vn/api/p/{$provinceId}?depth=2");

        if ($response->successful()) {
            $data = $response->json();
            $this->districts = $data['districts'] ?? [];

            foreach ($this->districts as $district) {
                $this->districtMap[$district['code']] = $district['name'];
            }
        }

        $this->wards = [];
        $this->selectedDistrict = null;
        $this->selectedWard = null;
    }

    #[On('change-district')]
    public function updatedSelectedDistrict($districtId)
    {
        if (!$districtId) {
            $this->wards = [];
            $this->selectedWard = null;
            return;
        }

        $response = Http::withoutVerifying()->get("https://provinces.open-api.vn/api/d/{$districtId}?depth=2");

        if ($response->successful()) {
            $data = $response->json();
            $this->wards = $data['wards'] ?? [];

            foreach ($this->wards as $ward) {
                $this->wardMap[$ward['code']] = $ward['name'];
            }
        }

        $this->selectedWard = null;
    }

    public function addressAdd()
    {
        $provinceName = $this->provinceMap[$this->selectedProvince] ?? null;
        $districtName = $this->districtMap[$this->selectedDistrict] ?? null;
        $wardName     = $this->wardMap[$this->selectedWard] ?? null;

        CheckoutAddresses::create([
            'user_id'       => Auth::id(),
            'province_name' => $provinceName,
            'district_name' => $districtName,
            'ward_name'     => $wardName,
            'address'       => $this->address,
            'phone'         => $this->phone,
            'status'        => 1,
        ]);

        session()->flash('success', 'Địa chỉ đã được lưu.');

        $this->reset(['selectedProvince', 'selectedDistrict', 'selectedWard', 'address', 'phone']);
        $this->districts = [];
        $this->wards = [];
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('livewire.client.address', ['user' => $this->user]);
    }
}
    