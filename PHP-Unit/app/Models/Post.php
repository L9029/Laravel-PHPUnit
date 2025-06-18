<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Muttators
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    // Accessors
    public function getSlugAttribute(){
        return str_replace(' ', '-', $this->attributes['name']);
    }

    public function href(){
        return 'blog/' . $this->slug;
    }
}
