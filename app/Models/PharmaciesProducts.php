<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmaciesProducts extends Model
{
    use  HasFactory;

    protected $table = "pharmacies_products";

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'products_id',
        'pharmacies_id',
        'quantity',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
    public function pharmacies()
    {
        return $this->belongsTo(Pharmacies::class);
    }

}
