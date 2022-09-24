<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','detail','slug','development_sector','lang_framework','feature','author','view_count','status'];

   /*  public function setCategoryAttribute($value)
    {
        $this->attributes['lang_framework'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['lang_framework'] = json_decode($value);
    } */
}
