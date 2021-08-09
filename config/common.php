<?php
return [
    'user' => [
        'gender' => [
            "male" => 1,
            "female" => 0
        ],
        'role' => [
            "user" => 1,
            "admin" => 2
        ],
    ],
    'invoice' => [
        'status' => [
            "cho_duyet" => 1,
            "dang_xu_ly" => 2,
            "dang_giao_hang" => 3,
            "da_giao_hang" => 4,
            "da_huy" => 5,
            "chuyen_hoan" => 6,
        ],
    ],
    'product_order_by' => [
        1 => 'Sản phẩm mới nhất',
        2 => 'Giá tăng dần',
        3 => 'Giá giảm dần',
        4 => 'Số lượng tăng dần',
        5 => 'Số lượng giảm dần',
    ],
    'posts' => [
        'status' => [
            1 => 'Hiện',
            2 => 'Ẩn'
        ],
    ],

];

// 2 => 'Sắp xếp theo tên giảm dần',
