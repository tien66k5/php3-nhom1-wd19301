<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = ['name', 'status'];

    public function values()
    {
        return $this->hasMany(OptionValue::class, 'option_id');
    }
}
