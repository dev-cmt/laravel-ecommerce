<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_management_id',
        'movement_type',
        'quantity',
        'movement_date',
        'status'
    ];

    public function inventoryManagement()
    {
        return $this->belongsTo(InventoryManagement::class);
    }
}
