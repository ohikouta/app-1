<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    // 与えた引数のデータを更新日順に取得するメソッドを以下に作成
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // Modelクラスのlimitメソッドを使用
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
}
