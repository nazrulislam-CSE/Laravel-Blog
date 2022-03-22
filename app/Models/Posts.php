<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Posts extends Model
{
    use HasFactory;
    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title','slug','content','category_id','user_id','featured'];
    
    public function getFeaturedAttribute($featured)
    {
    	return asset($featured);
    }

    public function category(){
    	return $this->belongsTo('App\Models\category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Models\Tags');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
