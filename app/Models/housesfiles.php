<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class housesfiles extends Model
{
    use HasFactory;

    // protected $fillable =['location','website','tags','description','email','company','title'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like', '%'.request('tag').'%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like', '%'.request('search').'%')
              ->orWhere('description','like', '%'.request('search').'%')
              ->orWhere('tags','like', '%'.request('search').'%');
        }
    }

    // Relationship with user 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
