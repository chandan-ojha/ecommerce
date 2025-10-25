<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table   = 'orders';
    protected $guarded = [];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
