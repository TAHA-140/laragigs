<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // The $fillable property makes it easier and safer to add values to the model 
    // directly from an array. It allows only specific fields, 'user_id' and 'listing_id', 
    // to be mass-assigned, preventing unwanted changes to other fields.
    //=========================================================================================
    // This will let us fill the data to the database.
    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'tags', 'description'];

    // Filter function.
    public function scopeFilter($query, array $filters){
        //if $filters not empty.
        if($filters['tag'] ?? false){
            //filter the listings by tag.
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        //if $filters not empty.
        if($filters['search'] ?? false){
            //filter the listings by searching for (title, tags, description).
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('tags', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship To User
    // Listing belongs to user and the relation between them is user_id (Foreign key)
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // Relationship With Like
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
