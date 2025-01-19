<?php

use App\ValueObjects\Order;
use Illuminate\Support\Collection;

it('can use collection with higher order messages', function () {
    /** @var Collection<int, Order> $orders */
    $orders = new Collection(
        [
            new Order('123', '2021-01-01', 'pending'),
            new Order('223', '2021-01-01', 'pending'),
            new Order('323', '2021-01-01', 'pending'),
            new Order('423', '2021-01-01', 'pending'),
            new Order('523', '2021-01-01', 'pending'),
        ]
    );

    $orders->each->markCompleted();

    expect($orders->random()->getOrderStatus())->toBe('completed');
});

