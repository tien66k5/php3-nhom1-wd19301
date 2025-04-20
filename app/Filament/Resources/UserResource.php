<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Họ và tên')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập tên đăng nhập',
                    ]),
    
                Forms\Components\TextInput::make('firstname')
                    ->label('Tên')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập tên',
                    ]),
    
                Forms\Components\TextInput::make('lastname')
                    ->label('Họ')
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng nhập họ',
                    ]),
    
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true) // tránh lỗi khi edit
                    ->validationMessages([
                        'required' => 'Vui lòng nhập email',
                        'email' => 'Email không đúng định dạng',
                        'unique' => 'Email đã tồn tại trong hệ thống',
                    ]),
    
                Forms\Components\TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->tel()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->rule('regex:/^0[0-9]{9}$/')
                    ->validationMessages([
                        'required' => 'Vui lòng nhập số điện thoại',
                        'regex' => 'Số điện thoại không đúng định dạng (10 số, bắt đầu bằng 0)',
                        'unique' => 'Số điện thoại đã tồn tại trong hệ thống',
                    ]),
    
                Forms\Components\FileUpload::make('avatar')
                    ->label('Ảnh đại diện')
                    ->image(),
    
                Forms\Components\TextInput::make('password')
                    ->label('Mật khẩu')
                    ->password()
                    ->nullable()
                    ->minLength(8)
                    ->validationMessages([
                        'min' => 'Mật khẩu phải có ít nhất 8 ký tự',
                    ]),
    
                Forms\Components\Select::make('role')
                    ->label('Vai trò')
                    ->options([
                        2 => 'Quản trị viên',
                        1 => 'Người dùng',
                    ])
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng chọn vai trò',
                    ]),
    
                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        1 => 'Đang hoạt động',
                        0 => 'Đã bị khóa',
                        2 => 'Ngừng hoạt động',
                    ])
                    ->required()
                    ->validationMessages([
                        'required' => 'Vui lòng chọn trạng thái',
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Họ và Tên')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('SĐT')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Ảnh đại diện')
                    ->circular(),
                    Tables\Columns\TextColumn::make('role')
                    ->label('Vai trò')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            2 => 'Quản trị viên',
                            1 => 'Người dùng',

                        };
                    })
                    ->badge()
                    ->color(function ($state) {
                        return match ($state) {
                            2 => 'danger',
                            1 => 'primary', 
            
                        };
                    }),

                    Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái')
                    ->sortable()
                    ->badge() 
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            2 => 'Ngừng hoạt động',
                            1 => 'Đang hoạt động',
                            0 => 'Đã bị khóa',
                        };
                    })
                    ->color(function ($state) {
                        return match ($state) {
                            2 => 'warning', 
                            1 => 'success',     
                            0 => 'danger',      

                        };
                    }),
                

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Ngừng hoạt động',
                    ]),

                Tables\Filters\SelectFilter::make('role')
                    ->label('Vai trò')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
