<?php

return [
    'required' => ':attribute không được để trống.',
    'string' => ':attribute phải là một chuỗi ký tự.',
    'max' => [
        'string' => ':attribute không được vượt quá :max ký tự.',
    ],
    'min' => [
        'string' => ':attribute phải có ít nhất :min ký tự.',
    ],
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'unique' => ':attribute đã tồn tại.',
    'numeric' => ':attribute phải là số.',
    'digits_between' => ':attribute phải có từ :min đến :max chữ số.',
    'confirmed' => ':attribute không khớp.',

  
    'attributes' => [
        'name' => 'Tên đăng nhập',
        'firstname' => 'Tên',
        'lastname' => 'Họ',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Nhập lại mật khẩu',
    ],
];
