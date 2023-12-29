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
        'type',
        'availability',
        'fuel',
        'transmission'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
