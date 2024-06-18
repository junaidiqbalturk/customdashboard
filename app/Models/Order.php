<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'city','country','phonenumber', 'digitizing_type', 'length', 'width', 'placement', 'image_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}