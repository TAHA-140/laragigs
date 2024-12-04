<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // The $fillable property makes it easier and safer to add values to the model 
    // directly from an array. It allows only specific fields, 'user_id' and 'listing_id', 
    // to be mass-assigned, preventing unwanted changes to other fields.
    protected $fillable = ['user_id', 'listing_id'];

    // Relationship with User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relationship with Listing
    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
