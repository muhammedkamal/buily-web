<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Product extends Model
{
    //use Searchable;


    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 5
        ]
    ];

    /** The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'id',
       'name',
       'description',
       'cover',
       'quantity',
       'price',
   ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
