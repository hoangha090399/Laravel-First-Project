<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 'address', 'birthday','avatar', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('User');
        //xác định quan hệ có thể đảo ngược nhau  1 article có thể truy cập đến user, 
        //và ngược lại 1 user cũng có thể truy cập lấy thông tin 1 article
    }
}
