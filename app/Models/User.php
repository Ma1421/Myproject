<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'body',
        'country',
        'departure',
        'return',
        'live',
        'occupation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function comments(): HasMany
    {
        return $this->hasMany('App\Comment');
    }
    
    //多対多のリレーションを書く
    public function likes()
    {
        return $this->belongsToMany('App\Models\Post','likes','user_id','post_id')->withTimestamps();
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($postId)
    {
      return $this->likes()->where('post_id',$postId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($postId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($postId);
      } else {
      }
    }
    
    public function follows()//自分がフォローしている人を取得する
    {
        return $this->belongsToMany(User::class, "followers", "following_id", "followed_id");
    }//第2引数はオリジナルの名前を付けた時はLaravelが認識するために必須、第3引数が自分側、第4引数は相手側

    public function followers()//自分をフォローしている人を取得する
    {
        return $this->belongsToMany(User::class, "followers", "followed_id", "following_id");
    }
    
    
    

}
