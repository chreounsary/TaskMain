<?php

/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
|
| This file contains constants for the application
|
*/

return [
    // User
    'user' => [
        'role' => [
            'super_admin' => 'super-admin',
            'admin' => 'admin',
            'agency' => 'agency', // store manager
            'member' => 'member',
            'bm' => 'bm', // business manager
            'am' => 'am',
            'om' => 'om',
            'mc' => 'mc',
        ],
        'status' => [
            'active' => 1,
            'inactive' => 0
        ],
        'type' => [
            'hq' => 'hq',
            'agency' => 'agency'
        ]
    ],
    // Agency
    'agency' => [
        'status' => [
            'approve' => 'approve',
            'pending' => 'pending',
        ],
    ],
    // Order
    'order' => [
        'status' => [
            'complete' => 'complete',
            'reject' => 'reject',
            'confirm' => 'confirm',
            'pending' => 'pending',
            'delivery' => 'delivery',
        ],
        'invoice' => [
            'prefix' => 'IN',
        ],
    ],
    // Product
    'product' => [
        'status' => [
            'active' => 1,
            'inactive' => 2,
            'trash' => 'trash'
        ],
        'type' => [
            'status' => [
                'active' => 1,
                'inactive' => 0
            ]
        ]
    ],
    // Shipment or Booking
    'shipment' => [
        'code' => [
            'digit' => 6,
            'prefix' => 'JET-',
        ],
        'payment_status' => [
            'paid' => 'paid',
            'unpaid' => 'unpaid'
        ],
        'status' => [
            'pending' => 'pending',
        ]
    ],
    'shipment_detail' => [
        'status' => [
            'shipping' => 1,
            'arrived' => 2,
        ]
    ],
    // Payment methods
    'payment_method' => [
        'e-wallet' =>  'ewallet',
        'bank' => 'bank'
    ],
    'currency' => [
        'USD' => 'USD',
        'KHR' => 'KHR',
    ],
    'material' => [
        'status' => [
            'active' => 1,
            'inactive' => 0,
            'trash' => 'trash'
        ]
    ],
    'payment' => [
        'status' => [
            'active' => 1,
            'inactive' => 0,
        ]
    ],
    'uom' => [
        'status' => [
            'active' => 1,
            'inactive' => 2,
        ]
    ],
    'category' => [
        'status' => [
            'active' => 1,
            'inactive' => 2,
            'trash' => 3
        ]
    ],
    'partner' => [
        'status' => [
            'active' => 1,
            'inactive' => 2,
            'trash' => 3
        ]
    ],
    'uom' => [
        'status' => [
            'active' => 1,
            'inactive' => 2,
            'trash' => 3
        ]
    ],
];
