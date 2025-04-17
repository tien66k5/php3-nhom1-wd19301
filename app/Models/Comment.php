<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    //protected $table = 'comments';
    protected $fillable = ['content', 'rating_id', 'product_id', 'user_id', 'parent_id', 'status'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class); 
    }

    public function rating()
{
    return $this->belongsTo(Rating::class);
}

}
