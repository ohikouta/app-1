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
        'body'
        ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // Modelクラスのlimitメソッドを使用
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
}
