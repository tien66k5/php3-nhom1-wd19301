<?php

return [
    'required' => ':attribute không được để trống.',
    'string' => ':attribute phải là một chuỗi ký tự.',
    'max' => [
        'string' => ':attribute không được vượt quá :max ký tự.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
    ],
    'min' => [
        'string' => ':attribute phải có ít nhất :min ký tự.',
    ],
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'unique' => ':attribute đã tồn tại.',
    'numeric' => ':attribute phải là số.',
    'digits_between' => ':attribute phải có từ :min đến :max chữ số.',
    'confirmed' => ':attribute không khớp.',
   // 'image' => ':attribute phải là một tệp hình ảnh hợp lệ.',
    'mimes' => ':attribute phải có định dạng: :values.',
   /*  'max' => [
        'file' => ':attribute không được lớn hơn :max kilobytes.',
    ], */

    'attributes' => [
        'name' => 'Tên đăng nhập',
        'firstname' => 'Tên',
        'lastname' => 'Họ',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Nhập lại mật khẩu',
        'avatar' => 'Avatar', 
    ],

    'avatar' => [
       // 'image' => 'Vui lòng chọn một tệp hình ảnh hợp lệ cho avatar.',
        'mimes' => 'Avatar phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        'max' => 'Kích thước avatar không được vượt quá 2MB.',
    ],
];
