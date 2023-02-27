<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'body',
    'image_url',
];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}



//カラム名を追加していくデータベース操作のための
//ここはモデルクラス