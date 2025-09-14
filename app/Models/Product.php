<?php

namespace App\Models;
use App\Enums\ProductStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title','slug','price','stock','description','category_id','is_active','status'
    ];
    protected $casts = [
        'status' => ProductStatus::class,
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
