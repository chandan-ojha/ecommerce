<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table   = 'orders';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user_address()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
