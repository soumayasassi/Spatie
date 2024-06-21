<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description' ,
        'price',
        'stock' ,

    ];
    public function category()
    {
        return $this->belongsTo(category::class) ;
    }

    public function catalogues()
    {
        return $this->belongsToMany(Catalogue::class) ;
    }

}
