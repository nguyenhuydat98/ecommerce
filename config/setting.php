<?php

return [
    'role' => [
        'management'    => 1,
        'admin_product' => 2,
        'admin_order'   => 3,

    ],

    'status' => [
        'pending'   => 1,
        'approved'  => 2,
        'rejected'  => 3,
        'canceled'  => 4,
    ],

    'default' => [
        'avatar' => 'storage/avatar_default.png',
    ],

    // 'color' => [
    //     'black'  => 1,
    //     'white'  => 2,
    //     'gold'   => 3,
    //     'pink'   => 4,
    // ],

    'paginate' => [
        'product' => 12,
        'order' => 10,
    ],

    'formality' => [
        'percent' => 1,
        'amount' => 2,
    ],

];
