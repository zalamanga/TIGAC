<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING    = 'pending';
    const STATUS_PAID       = 'paid';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED    = 'shipped';
    const STATUS_COMPLETED  = 'completed';
    const STATUS_CANCELLED  = 'cancelled';

    public static array $statuses = [
        self::STATUS_PENDING,
        self::STATUS_PAID,
        self::STATUS_PROCESSING,
        self::STATUS_SHIPPED,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELLED,
    ];

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'notes',
        'subtotal',
        'shipping_cost',
        'shipping_method',
        'total',
        'status',
        'payment_method',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusBadgeClass(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING    => 'bg-warning',
            self::STATUS_PAID       => 'bg-info',
            self::STATUS_PROCESSING => 'bg-primary',
            self::STATUS_SHIPPED    => 'bg-secondary',
            self::STATUS_COMPLETED  => 'bg-success',
            self::STATUS_CANCELLED  => 'bg-danger',
            default                 => 'bg-light text-dark',
        };
    }
}
