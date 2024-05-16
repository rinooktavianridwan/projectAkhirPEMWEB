<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'image',
        'city',
        'status',
        'transaction_id',
        'price',
    ];

    /**
     * Get the full path to the car's image.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {
        // Assuming 'storage/app/public/images' as the storage directory for images
        return asset('storage/images/' . $this->image);
    }
}
