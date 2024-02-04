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
        'bio',
        'follow',
        'image',
        'password',
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
        'password' => 'hashed',
    ];

    public function ideas(){
       return $this->hasMany(Idea::class);
    }
    
    public function comments(){
       return $this->hasMany(Comment::class);
    }

    // a user can have many followers
    public function followers(){
        return $this->belongsToMany(User::class,'followers','following_id','follower_id')->withTimestamps();
    }

    public function following(){
        return $this->belongsToMany(User::class,'followers','follower_id','following_id')->withTimestamps();;
    }

    public function is_follow(User $user){

        return $this->following()->where('following_id',$user->id)->exists();
    }
    // this user love all those ideas return them
    public function like(){
        return $this->belongsToMany(Idea::class)->withTimestamps();
    }
    public function is_like(Idea $idea){

        return $this->like()->where('idea_id',$idea->id)->exists() ;
    }
}

