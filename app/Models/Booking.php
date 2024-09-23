<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Get the customer that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id', 'id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    
    public function services()
    {
        return $this->hasManyThrough(Service::class, Vendor::class, 'id', 'vendor_id', 'vendor_id', 'id');
    }
}
