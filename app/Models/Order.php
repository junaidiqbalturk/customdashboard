<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'city','country','phonenumber', 'digitizing_type', 'length', 'width', 'placement', 'image_path','status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Relationship with the OrderStatus model
     public function status()
     {
         return $this->belongsTo(Status::class, 'status_id');
     }

     //Relationship with Invoices Generation
     public function invoices()
     {
         return $this->hasMany(Invoice::class);
     }
}
