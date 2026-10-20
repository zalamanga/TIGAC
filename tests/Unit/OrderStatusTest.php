<?php

namespace Tests\Unit;

use App\Models\Order;
use PHPUnit\Framework\TestCase;

class OrderStatusTest extends TestCase
{
    public function test_order_transitions_cannot_return_to_pending_or_skip_payment(): void
    {
        $expected = [
            'pending' => ['cancelled'],
            'paid' => ['processing', 'shipped', 'completed'],
            'processing' => ['shipped', 'completed'],
            'shipped' => ['completed'],
            'completed' => [],
            'cancelled' => [],
        ];
        foreach ($expected as $status => $next) {
            $order = new Order(['status' => $status]);
            $this->assertSame($next, $order->allowedNextStatuses(), $status);
        }
    }
}
