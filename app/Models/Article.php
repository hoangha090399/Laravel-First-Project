<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Models\Tag;

class Article extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'user_id', 'title', 'body', 'status',//các thuộc tính
    ];

    public function user() {
        return $this->belongsTo('\App\Models\User');
        //xác định quan hệ có thể đảo ngược nhau  1 article có thể truy cập đến user, 
        //và ngược lại 1 user cũng có thể truy cập lấy thông tin 1 article
    }

    /**
     * Get the tags for the article
    */

    public function profile() {
        return $this->belongsTo('\App\Models\Profile');
        //xác định quan hệ có thể đảo ngược nhau  1 article có thể truy cập đến user, 
        //và ngược lại 1 user cũng có thể truy cập lấy thông tin 1 article
    }

    public function tags() {
        return $this->belongsToMany('\App\Models\Tag');
    }

    /**
     * Get all of the profiles' comments.
     */
    //public function comments(){
    // return $this->morphMany('Comment', 'commentable');
    // }

    
}
