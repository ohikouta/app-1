<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    // クラス変数fillableを定義
    protected $fillable = [
        'title',
        'body',
        'category_id',
        ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // Modelクラスのlimitメソッドを使用
        return $this::with('category')->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // Categoryに対するリレーション
    
    // 「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
