<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fiabllable = ['id','name','category_id','description','status','created_at','updated_at'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');

    }
}

