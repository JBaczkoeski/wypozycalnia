<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable=[
        'brand_id',
        'model',
        'year',
        'registration_number',
        'price_per_day',
        'power',
        'type',
        'availability',
        'fuel',
        'transmission',
        'photo'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
